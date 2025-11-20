@extends('portfolio.layout.index')

@section('body')
<section class="min-h-screen py-20 w-[1200px]">
    <div class="container mx-auto px-4">
        <h2 class="text-5xl font-bold text-white mb-12 text-center">Projects</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Project 1 --}}
            <div class="bg-gray-900 rounded-lg p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300 border border-white-900">
                <img src="{{ asset('images/portimage/images.jpeg') }}" alt="Hospital Management System" class="rounded-lg mb-4 w-3xs h-48 object-cover">
                <h3 class="text-2xl font-semibold text-white mb-2">Hospital Management System</h3>
                <p class="text-gray-200 mb-2">A full-stack MERN application for managing hospital records, appointments, and patient data efficiently.</p>
                <p class="text-gray-400 text-sm mb-4"><strong>Tech Stack:</strong> MongoDB, Express, React, Node.js</p>
                <a href="#" class="mt-auto bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded text-center">View Project</a>
            </div>

            {{-- Project 2 --}}
            <div class="bg-gray-900 rounded-lg p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300 border border-white-900">
                <img src="{{ asset('images/portimage/project2.png') }}" alt="Student Result Portal" class="rounded-lg mb-4 h-48 object-cover">
                <h3 class="text-2xl font-semibold text-white mb-2">Student Result Portal</h3>
                <p class="text-gray-200 mb-2">A PHP + MySQL web application to manage student results, generate reports, and view performance analytics.</p>
                <p class="text-gray-400 text-sm mb-4"><strong>Tech Stack:</strong> PHP, MySQL, HTML, CSS</p>
                <a href="#" class="mt-auto bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded text-center">View Project</a>
            </div>

            {{-- Project 3 --}}
            <div class="bg-gray-900 rounded-lg p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300 border border-white-900">
                <img src="{{ asset('images/portimage/project3.png') }}" alt="Portfolio Website" class="rounded-lg mb-4 h-48 object-cover">
                <h3 class="text-2xl font-semibold text-white mb-2">Portfolio Website</h3>
                <p class="text-gray-200 mb-2">This portfolio website showcasing skills, projects, and contact form using Laravel Blade and Tailwind CSS.</p>
                <p class="text-gray-400 text-sm mb-4"><strong>Tech Stack:</strong> Laravel, Tailwind CSS, PHP</p>
                <a href="#" class="mt-auto bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded text-center">View Project</a>
            </div>

            {{-- Project 4 --}}
            <div class="bg-gray-900 rounded-lg p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300 border border-white-900">
                <img src="{{ asset('images/portimage/project4.png') }}" alt="E-Commerce Platform" class="rounded-lg mb-4 h-48 object-cover">
                <h3 class="text-2xl font-semibold text-white mb-2">E-Commerce Platform</h3>
                <p class="text-gray-200 mb-2">An online shopping platform with product listing, cart functionality, payment integration, and admin panel.</p>
                <p class="text-gray-400 text-sm mb-4"><strong>Tech Stack:</strong> Laravel, MySQL, Tailwind CSS</p>
                <a href="#" class="mt-auto bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded text-center">View Project</a>
            </div>

            {{-- Project 5 --}}
            <div class="bg-gray-900 rounded-lg p-6 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300 border border-white-900">
                <img src="{{ asset('images/portimage/project5.png') }}" alt="Blog CMS" class="rounded-lg mb-4 h-48 object-cover">
                <h3 class="text-2xl font-semibold text-white mb-2">Blog CMS</h3>
                <p class="text-gray-200 mb-2">A content management system for blogging with post creation, editing, and commenting features.</p>
                <p class="text-gray-400 text-sm mb-4"><strong>Tech Stack:</strong> PHP, MySQL, Tailwind CSS</p>
                <a href="#" class="mt-auto bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded text-center">View Project</a>
            </div>
        </div>
    </div>
</section>
@endsection
