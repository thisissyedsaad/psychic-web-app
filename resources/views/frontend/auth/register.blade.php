@extends('frontend.layouts.main')

@section('title', 'Login - Top Rated Psychics')

@section('content')
    <main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow" style="
                  margin-top: 0;
                  margin-bottom: 0;
                  padding-top: 0;
                  padding-right: 0;
                  padding-bottom: 0;
                  padding-left: 0;
                ">
        <div class="wp-block-group alignwide has-global-padding is-layout-constrained wp-container-core-group-is-layout-2843ed05 wp-block-group-is-layout-constrained"
            style="padding-top: 0; padding-bottom: 0">
            <h1 style="
                      padding-top: 0;
                      padding-bottom: var(--wp--preset--spacing--40);
                    " class="alignwide wp-block-post-title">
                Register
            </h1>

            <div class="entry-content alignwide wp-block-post-content is-layout-flow wp-block-post-content-is-layout-flow">
                <p>
                    Create your account to connect with trusted psychics and unlock
                    personalized spiritual guidance today.
                </p>

                <p>
                    Already have an account?
                    <span style="text-decoration: underline"><a href="{{ route('login') }}" title="">Login</a></span>
                </p>

                <p></p>
            </div>
        </div>
    </main>
@endsection