<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
        integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-Home: 1;
            background-color: #f8f0fa;
            padding-top: 3rem;
        }

        .content {
            margin-left: 120px;
        }

        .nav-link {
            color: #333;
        }

        .nav-link-white {
            color: #fefefe;
        }

        .nav-link-white:hover {
            color: #fefefe
        }

        .nav-linkactive {
            padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
            display: block;
            padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
            font-size: var(--bs-nav-link-font-size);
            font-weight: var(--bs-nav-link-font-weight);
            color: var(--bs-nav-link-color);
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ Request::routeIs('Home') ? 'active' : '' }}" href="{{ route('Home') }}"><i
                        class="fa-solid fa-house mx-1"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ Request::routeIs('allCategories') ? 'active' : '' }}"
                    href="{{ route('allCategories') }}"><i class="fa-brands fa-slack mx-1"></i>Categories</a>
            </li>
            <li class="nav-item">

                <a class="nav-link{{ Request::routeIs('post.index') ? 'active' : '' }}"
                    href="{{ route('posts.index') }}"><i class="fa-solid fa-address-card mx-1"></i>Posts</a>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('flashy::message')

</body>

</html>
