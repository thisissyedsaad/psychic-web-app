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
                Login
            </h1>

            <div class="entry-content alignwide wp-block-post-content is-layout-flow wp-block-post-content-is-layout-flow">
                <p>
                    Log in to access your favorite psychics, saved readings, and
                    personalized spiritual insights.<br />
                </p>

                <p>
                    Don&#8217;t have an account?
                    <a href="{{ route('register') }}" title=""><strong>Create account</strong></a>
                    and connect with top rated psychics intantly.
                </p>

                <p></p>
            </div>
        </div>
    </main>
@endsection