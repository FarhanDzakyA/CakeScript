@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <div class="flex flex-col items-center py-16" data-aos="fade-up">
        <p class="font-bold text-6xl text-brown mb-6">Contact Us</p>
        <p class="w-2/4 text-center">At CakeScript, we understand the key ingredients that drive change. We're here to provide the components you need to create the perfect experience in the bakery industry.</p>
    </div>

    <div class="px-28 py-16" data-aos="zoom-in">
        <div class="grid grid-cols-3 gap-x-12 min-h-[calc(100vh-284px)] px-4 py-4 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col col-span-2">
                <p class="font-bold text-2xl mb-6">Visit Us</p>
                <p class="mb-4">Jl. Oda Nobunaga No. 1945, RT 004 / RW 016, Gatka, Primorsk, Erangel</p> 
    
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127101.53627639891!2d105.18833614419597!3d-5.428666519276554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da46f3aa6fbf%3A0x3039d80b220cc40!2sBandar%20Lampung%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1731251317168!5m2!1sid!2sid" class="h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    
            <div>
                <p class="font-bold text-2xl mb-6">Contact Information</p>
                <p class="mb-4">Please contact us for further information.</p>

                <a href="https://wa.me/081235678901" target="_blank" class="flex items-center justify-start gap-x-6 mb-3 font-semibold">
                    <i class="fa-brands fa-whatsapp text-4xl"></i>
                    <div class="flex flex-col">
                        <p>WhatsApp</p>
                        <p>0812-3567-8901</p>
                    </div>
                </a>

                <a href="https://wa.me/083187654321" target="_blank" class="flex items-center justify-start gap-x-6 mb-3 font-semibold">
                    <i class="fa-brands fa-whatsapp text-4xl"></i>
                    <div class="flex flex-col">
                        <p>WhatsApp</p>
                        <p>0831-8765-4321</p>
                    </div>
                </a>

                <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=cakescript@gmail.com" target="_blank" class="flex items-center justify-start gap-x-6 font-semibold">
                    <i class="fa-regular fa-envelope text-4xl"></i>
                    <div class="flex flex-col">
                        <p>Gmail</p>
                        <p>cakescript@gmail.com</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection