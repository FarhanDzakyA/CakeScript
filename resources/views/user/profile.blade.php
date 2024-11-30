    @extends('layouts.app')

    @section('content')
    <div class="bg-gray-100 py-16 px-32">
        <div class="grid grid-cols-5">
            <div class="col-span-2">
                <p class="font-medium text-lg text-brown">Profile Information</p>
                <p class="text-gray-700">Update your account's profile information and email address.</p>
            </div>
            <div class="col-span-3">
                <div class="w-full bg-white rounded-md shadow-md p-5">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="full_name" class="font-sans font-semibold text-leaf">Full Name</label>
                            <input type="text" id="full_name" name="nama" class="w-full bg-transparent border border-gray-400 font-sans rounded-lg focus:ring-2 focus:ring-leaf focus:border-transparent focus:outline-none p-2.5" placeholder="John Doe" value="{{ old('nama') ?? auth()->user()->nama }}">
                            <p class="text-sm font-medium text-red-600 h-2">
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-2">
                            <label for="no_hp" class="font-sans font-semibold text-leaf">Phone Number</label>
                            <input type="text" id="no_hp" name="no_hp" class="w-full bg-transparent border border-gray-400 font-sans rounded-lg focus:ring-2 focus:ring-leaf focus:border-transparent focus:outline-none p-2.5" placeholder="08XXXXXXXXXX" value="{{ old('no_hp') ?? auth()->user()->no_hp }}">
                            <p class="text-sm font-medium text-red-600 h-2">
                                @error('no_hp')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-2">
                            <label for="address" class="font-sans font-semibold text-leaf">Address</label>
                            <textarea id="address" name="alamat" rows="2" class="w-full bg-transparent border border-gray-400 font-sans rounded-lg focus:ring-2 focus:ring-leaf focus:border-transparent focus:outline-none p-2.5" placeholder="Enter your address">{{ old('alamat') ?? auth()->user()->alamat }}</textarea>
                            <p class="text-sm font-medium text-red-600 h-2">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="font-sans font-semibold text-leaf">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full bg-transparent border border-gray-400 font-sans rounded-lg focus:ring-2 focus:ring-leaf focus:border-transparent focus:outline-none p-2.5" placeholder="johndoe@gmail.com" value="{{ old('email') ?? auth()->user()->email }}">
                            <p class="text-sm font-medium text-red-600 h-2">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-leaf text-white font-semibold rounded-lg hover:bg-darkleaf">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
        @if(session()->has('success'))
            <script>
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("{{ session('success') }}");
            </script>
        @endif
    @endsection