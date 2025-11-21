<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-base text-white uppercase tracking-wide hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 shadow-lg hover:shadow-xl transition-all duration-200']) }} style="background-color: #4F46E5; color: white;">
    {{ $slot }}
</button>
