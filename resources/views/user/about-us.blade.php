@extends('layouts.app')

@section('content')
<div class="bg-gray-100">
    <!-- History Section -->
    <div class="flex flex-col items-center justify-start px-60 py-16">
        <p class="text-brown text-lg font-medium mb-2" data-aos="fade-up">EST. 2024</p>
        <p class="text-4xl font-bold mb-8" data-aos="fade-up">History</p>
        <p class="text-center" data-aos="fade-up">
            Founded in 2024 by Udin Petot, CakeScript quickly rose to prominence in Indonesia's bakery industry. With a passion for creating memorable, high-quality baked goods, Petot aimed to transform the way people experience dessert. Driven by a commitment to excellence and innovation, CakeScript offers a diverse array of handcrafted cakes, pastries, and sweets that cater to all kinds of celebrations and tastes. From classic flavors to bold new creations, each item is crafted with care and attention to detail, using only the finest ingredients.<br><br>
            In just a short time, CakeScript has become known for its exceptional quality and dedication to customer satisfaction. By combining traditional baking techniques with modern flavors, the company has captured the hearts of customers across the archipelago. As CakeScript continues to grow, it remains committed to its founding vision: to bring joy, comfort, and indulgence to every occasion, one delicious bite at a time.
        </p>
    </div>
    <!-- End of History Section -->

    <div class="grid grid-cols-2 p-16">
        <img src="{{ asset('img/StorePhoto.png') }}" alt="Outlet Photo" class="object-cover object-center h-full rounded-md transition-transform transdform hover:scale-105" data-aos="fade-right">

        <div class="flex flex-col items-start justify-start ps-12" data-aos="fade-left">
            <p class="text-brown text-lg font-medium mb-2">Who We Are</p>
            <p class="text-4xl font-bold mb-8">CakeScript</p>
            <p class="text-justify">
                CakeScript is Indonesia's premier destination for bakery connoisseurs, embodying founder Udin Petot's commitment to creating memorable, delightful experiences through the art of baking. Since its founding in 2024, CakeScript has been dedicated to offering an exquisite range of cakes, pastries, and breads, each crafted with the finest ingredients and a passion for perfection. From elegant wedding cakes to freshly baked artisanal breads, every item in CakeScript’s lineup is thoughtfully designed to bring joy and indulgence to any occasion.<br><br>
                At CakeScript, customer satisfaction is paramount. From the moment customers walk into the bakery or visit the online store, they’re welcomed into a world of sweetness, quality, and personalized service. The team at CakeScript takes pride in understanding each customer’s unique preferences, offering custom creations and seasonal treats that capture the essence of both tradition and innovation. Beyond its delectable offerings, CakeScript fosters a vibrant community of dessert lovers, hosting baking workshops, tasting events, and exclusive gatherings for customers to explore and savor the artistry of the bakery world. With every creation, CakeScript reaffirms its commitment to bringing a touch of sweetness to life’s most cherished moments.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-2 p-16 gap-x-8" data-aos="zoom-in">
        <div class="flex flex-col border rounded-md border-gray-400 p-6">
            <p class="text-brown text-4xl font-bold mb-3">Our Vision</p>
            <p class="text-gray-500 text-2xl font-semibold mb-5">What We Strive to Achieve in the Near Future</p>
            <p class="text-justify">To be the premier destination for cake and pastry lovers in Indonesia, setting the benchmark for quality, creativity, and warmth in the bakery industry. CakeScript strives to bring joy and sweetness to every celebration, crafting delightful moments with exceptional, handcrafted creations.</p>
        </div>

        <div class="flex flex-col border rounded-md border-gray-400 p-6">
            <p class="text-brown text-4xl font-bold mb-3">Our Mision</p>
            <p class="text-gray-500 text-2xl font-semibold mb-5">What We Have to Achieve in the Near Future</p>
            <p class="text-justify">To provide exceptional quality, creativity, and customer care in every cake and pastry we craft. At CakeScript, we are committed to delivering delightful experiences by using the finest ingredients, innovative recipes, and personalized service. We aim to be a trusted part of every celebration, fostering lasting relationships with our customers and creating sweet moments that make life’s occasions truly memorable.</p>
        </div>
    </div>
</div>
@endsection