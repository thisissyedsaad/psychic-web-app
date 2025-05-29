@extends('frontend.layouts.main')

@section('title', 'How it Works - Top Rated Psychics')

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
                How It Works
            </h1>

            <div class="entry-content alignwide wp-block-post-content is-layout-flow wp-block-post-content-is-layout-flow">
                <p>
                    <strong>Connecting You with Trusted, Top-Rated Psychics – In Just a Few
                        Simple Steps</strong>
                </p>

                <p>
                    At Top Rated Psychics, we’ve made it easy for you to discover and
                    connect with the most gifted psychics — all in one place. Whether
                    you’re looking for answers in love, career, or life direction,
                    we’ve simplified the journey with a seamless subscription model.
                </p>

                <h2 class="wp-block-heading">Step 1: Choose Your Subscription</h2>

                <p>
                    To access detailed psychic profiles, read client testimonials, and
                    connect with top-rated psychics, simply subscribe to one of our
                    affordable plans:
                </p>

                <ul class="wp-block-list">
                    <li>
                        <strong>Monthly Plan</strong> – Ideal for short-term guidance or
                        one-off questions
                    </li>

                    <li>
                        <strong>Yearly Plan</strong> – Best value for ongoing insight
                        and support throughout the year
                    </li>
                </ul>

                <blockquote class="wp-block-quote is-layout-flow wp-block-quote-is-layout-flow">
                    <p>
                        <em>Your subscription gives you unlimited access to our psychic
                            directory, profiles, testimonials, and contact options.</em>
                    </p>
                </blockquote>

                <h2 class="wp-block-heading">Step 2: Explore Top Psychics</h2>

                <p>Once subscribed, you can:</p>

                <ul class="wp-block-list">
                    <li>
                        Browse our curated list of
                        <strong>verified and reviewed psychics</strong>
                    </li>

                    <li>
                        View detailed profiles that include:
                        <ul class="wp-block-list">
                            <li>Specialties (love, career, finances, etc.)</li>

                            <li>Tools used (tarot, astrology, clairvoyance, etc.)</li>

                            <li>Years of experience</li>

                            <li>Real client reviews and ratings</li>
                        </ul>
                    </li>
                </ul>

                <p>
                    Use filters to find the psychic that best suits your needs and
                    energy.
                </p>

                <h2 class="wp-block-heading">Step 3: Connect for a Reading</h2>

                <p>
                    Found the right psychic? You can now
                    <strong>connect directly</strong> with them to request a reading.
                    Depending on their availability and preferences, readings may be
                    offered via:
                </p>

                <ul class="wp-block-list">
                    <li>Chat</li>

                    <li>Email</li>

                    <li>Phone</li>

                    <li>Video</li>
                </ul>

                <p>
                    Each psychic may set their own pricing and availability for
                    readings, which will be visible on their profile.
                </p>

                <h2 class="wp-block-heading">Why Use Our Subscription Model?</h2>

                <ul class="wp-block-list">
                    <li>
                        No clutter – Only
                        <strong>vetted and top-rated psychics</strong> listed
                    </li>

                    <li>
                        Full access – View
                        <strong>unlimited profiles and reviews</strong>
                    </li>

                    <li>
                        Transparent – Know exactly who you&#8217;re connecting with
                    </li>

                    <li>Flexible – Choose the plan that fits your needs</li>
                </ul>

                <h2 class="wp-block-heading">Get Started Today</h2>

                <p>
                    Join thousands of users who have already found trusted guidance on
                    TopRatedPsychics.org.
                </p>

                <p>
                    <strong><a href="{{ route('home') }}">Subscribe Now</a></strong>
                    to unlock full access and connect with a psychic who truly
                    understands you.
                </p>

                <p>
                    Need help or have questions?
                    <a href="{{ route('contact-us') }}">Contact our support team</a> —
                    we’re here to guide you every step of the way.
                </p>

                <p></p>
            </div>
        </div>
    </main>
@endsection