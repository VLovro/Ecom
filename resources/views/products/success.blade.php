<x-layout heading="Order Confirmed!">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center bg-white rounded-lg shadow-md">
        <svg class="mx-auto h-24 w-24 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <h1 class="text-3xl font-bold text-gray-900 mt-6 mb-4">Thank You for Your Order!</h1>
        <p class="text-lg text-gray-700 mb-6">Your order has been placed successfully and is being processed.</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <p class="text-gray-600 mb-8">You will receive an email confirmation shortly with your order details.</p>

        <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Continue Shopping
        </a>
    
       
    </div>
</x-layout>
