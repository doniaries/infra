import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./resources/views/welcome.blade.php"
    ],
    plugins: [
        // require('tailwind-typewriter')({
        //     wordsets: {
        //         hero: {
        //             words: ['Ada Gangguan Jaringan?', 'Butuh Konsultasi Teknis?', 'Laporkan Sekarang!'],
        //             repeat: -1,
        //             writeSpeed: 0.1,    // Faster typing (lower is faster)
        //             eraseSpeed: 0.05,   // Faster erasing (lower is faster)
        //             delay: 0.5,         // Shorter initial delay
        //             pauseBetween: 1,    // Pause between words (in seconds)
        //             caret: '|',
        //             caretClassName: 'caret',
        //             lineBreak: false
        //         }
        //     },
        //     // Global options
        //     loop: true,
        //     deleteSpeed: 0.05,
        //     pauseTime: 1,
        //     nextWordDelay: 0,
        //     startDelay: 0.5
        // })
    ],
};
