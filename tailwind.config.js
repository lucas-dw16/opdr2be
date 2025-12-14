/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',               // alle Blade templates
    './resources/**/*.js',                            // JS-bestanden
    './resources/**/*.vue',                           // Vue-bestanden
    './app/View/Components/*.php',                    // Blade componenten
    './vendor/livewire/flux/stubs/**/*.blade.php',   // Flux stubs
    './vendor/livewire/flux-pro/stubs/**/*.blade.php'// Flux Pro stubs
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
