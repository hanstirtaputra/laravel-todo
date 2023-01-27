<!doctype html>

<title>TODO List</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            My List
        </div>
        <div class="mt-8 md:mt-0">
            <a href="/" class="text-xs font-bold uppercase">Home Page</a>
        </div>
    </nav>

    {{ $slot }}
</section>
</body>
