{{-- @dd(auth()->user()) --}}
@include('partials.header')
<nav class="bg-gray-900 py-5 px-[5%] fixed z-20 top-0 left-0 text-white flex justify-between items-center w-full mx-auto">
        <div class="text-lg">
            <a href="/">
                <span class="self-center text-xl font-semi bold whitespace-nowrap">
                    Student System
                </span>
            </a>
        </div>
        <div class="nav-links hidden md:block md:static md:min-h-fit absolute bg-gray-900 md:w-auto w-full mx-auto top-[100%] left-0" id="navbar-main">
            <ul class="flex flex-col md:flex-row items-center">

                @auth
                <li class="">
                    <a href="/add/student" class="px-4 py-2">
                        Add New
                    </a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="block py-2 pr-4 pl-3">
                            Logout
                        </button>
                    </form>
                </li>
                @else
                <li class="">
                    <a href="/login" class="px-4 py-2">
                        Sign In
                    </a>
                </li>
                <li>
                    <a href="/register" class="px-4 py-2">
                        Sign Up
                    </a>
                </li>
                @endauth
            </ul>
        </div>

        <div class="gap-lg">

            <a href="/register" class="bg-green-100 text-black py-2 px-5 rounded-3xl">Register</a>

            <ion-icon onclick="onToggleMenu(this)" class="align-middle text-3xl cursor-pointer md:hidden" name="menu"></ion-icon>
        </div>
</nav>
<header class="max-w-lg mx-auto mt-10">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
    </a>
</header>
<section class="overflow-x-auto mt-10">
    <div class="relative">
        <table class="w-96 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        First Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        age
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="bg-gray-800 text-white border-b">
                    <td class="py-4 px-6">
                        {{$student->first_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->last_name}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->email}}
                    </td>
                    <td class="py-4 px-6">
                        {{$student->age}}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/student/{{$student->id}}" class="bg-sky-600 px-3 py-1 rounded">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-fit ml-[53%] mt-[20px]">
            {{$students->links()}}
        </div>
    </div>
</section>
<script>
    // JavaScript for toggling menu in small screens
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('hidden');
    }
</script>
@include('partials.footer')

{{-- <ul>
    @foreach ($students as $student)
    <li>


            {{$student->first_name}} {{$student->last_name}}


    </li>
    @endforeach
</ul> --}}
