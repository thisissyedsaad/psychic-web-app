@extends('layouts.user-auth')
@section('title', 'Registration')

@section('content')

    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
        @if($site && $site->logo)
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $site->logo) }}" alt="Logo" style="max-height: 100px;">
            </div>
        @endif
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">{{ $site->name ?? 'Site Name' }}</h2>
        <p class="text-center mb-2">Join {{ $site->name ?? 'Site Name' }}</p>
        <p class="text-center mb-6">Create an account to join us.</p>
        
        <!-- Success Alert -->
        <div id="successAlert" class="hidden p-4 rounded mb-4 text-sm text-center" style="background: #f0fff4; color: #2f855a;">
            Verification email sent! Please check your inbox.
        </div>

        <!-- Error Alert -->
        <div id="errorAlert" class="hidden p-4 rounded mb-4 text-sm text-center" style="background: #fff1f0; color: #EA5455;">
        </div>

        <div class="p-4 rounded mb-4 text-sm text-center" style="background: #fff1f0; color: #EA5455;">
            We have sent a verification link to your email. If you can't see this email in your email's Inbox then check it
            in the Spam/Junk folder. Click on the link in the email to verify your email. After clicking the link in the
            email, you can come back to this screen and continue with the registration.
        </div>
        <form id="resendForm" class="space-y-4" action="{{ route('user.register.resend') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
                style="background-color: #EA5455; transition: background 0.2s;"
                onmouseover="this.style.backgroundColor='#d63c3d'" onmouseout="this.style.backgroundColor='#EA5455'">Resend
                Email Verification</button>
        </form>
        <div class="text-center mt-2 mb-4">
            <a href="{{ route('user.register.email') }}" class="text-sm" style="color: #EA5455;"
                onmouseover="this.style.color='#d63c3d'" onmouseout="this.style.color='#EA5455'">Change Email</a>
        </div>
        <div class="text-center text-sm mb-2">
            Already have an account? <a href="{{ route('user.login') }}" style="color: #EA5455;"
                onmouseover="this.style.color='#d63c3d'" onmouseout="this.style.color='#EA5455'">Sign in instead</a>
        </div>
        <div class="flex items-center justify-center mt-4 mb-4">
            <span class="border-b w-1/5 lg:w-1/4"></span>
            <span class="text-xs uppercase px-2">or</span>
            <span class="border-b w-1/5 lg:w-1/4"></span>
        </div>
        <div>
            <a href="#" class="w-full flex justify-center py-2 px-4 border bg-white text-sm font-medium rounded-md"
                onmouseover="this.style.background='#fff1f0'" onmouseout="this.style.background='#fff'">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5 mr-2"
                    alt="Google logo"> Sign in with Google
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "{{ env('FIREBASE_API_KEY') }}",
            authDomain: "{{ env('FIREBASE_AUTH_DOMAIN') }}",
            projectId: "{{ env('FIREBASE_PROJECT_ID') }}"
        };
        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        function showSuccessAlert(message) {
            const successAlert = document.getElementById('successAlert');
            successAlert.textContent = message;
            successAlert.classList.remove('hidden');
            setTimeout(() => {
                successAlert.classList.add('hidden');
            }, 5000);
        }

        function showErrorAlert(message) {
            const errorAlert = document.getElementById('errorAlert');
            errorAlert.textContent = message;
            errorAlert.classList.remove('hidden');
            setTimeout(() => {
                errorAlert.classList.add('hidden');
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const email = @json(session('registration_email'));
            let userRef = null;

            // Handle resend form submission
            const resendForm = document.getElementById('resendForm');
            resendForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (userRef) {
                    userRef.sendEmailVerification().then(() => {
                        showSuccessAlert('Verification email sent! Please check your inbox.');
                    }).catch((error) => {
                        showErrorAlert(error.message);
                    });
                }
            });

            // Try to create user and send verification
            auth.createUserWithEmailAndPassword(email, 'TempPassword123!')
                .then((userCredential) => {
                    userRef = userCredential.user;
                    userRef.sendEmailVerification().then(() => {
                        showSuccessAlert('Verification email sent! Please check your inbox.');
                        pollForVerification(userRef);
                    });
                })
                .catch((error) => {
                    if (error.code === 'auth/email-already-in-use') {
                        auth.signInWithEmailAndPassword(email, 'TempPassword123!')
                            .then((userCredential) => {
                                userRef = userCredential.user;
                                if (!userRef.emailVerified) {
                                    userRef.sendEmailVerification().then(() => {
                                        showSuccessAlert('Verification email sent! Please check your inbox.');
                                        pollForVerification(userRef);
                                    });
                                } else {
                                    pollForVerification(userRef);
                                }
                            });
                    } else {
                        showErrorAlert(error.message);
                    }
                });

            function pollForVerification(user) {
                const interval = setInterval(() => {
                    user.reload().then(() => {
                        if (user.emailVerified) {
                            clearInterval(interval);
                            // Notify backend
                            fetch("{{ route('user.register.firebase.verified') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    firebase_uid: user.uid,
                                    email: user.email
                                })
                            })
                                .then(response => {
                                    if (response.ok) {
                                        window.location.href = "{{ route('user.register.verified') }}";
                                    }
                                });
                        }
                    });
                }, 3000);
            }
        });
    </script>
@endpush