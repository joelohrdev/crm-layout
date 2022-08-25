<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TurnKey Digital</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg style="width:300px;height:auto;" xmlns="http://www.w3.org/2000/svg" id="Layer_2" viewBox="0 0 210.59 14.3">
                        <defs/>
                        <g id="Layer_1-2">
                            <g id="Layer_2-2">
                                <path d="M0 .08h11.86v3H7.71v10.83H4.1V3.06H0V.08ZM20.51 10.3c.52.54 1.25.82 2 .79.71.03 1.4-.26 1.88-.78.5-.58.76-1.33.72-2.1V.08h3.61v8.13a6.3 6.3 0 0 1-.76 3.15 5.18 5.18 0 0 1-2.17 2.08c-1.02.51-2.16.76-3.3.73-1.15.03-2.29-.22-3.33-.73a5.338 5.338 0 0 1-2.21-2.08 6.09 6.09 0 0 1-.78-3.15V.08h3.61v8.13c-.05.77.22 1.52.73 2.09ZM41.17 13.91l-2-3.82h-2.7v3.82h-3.61V.08h6.22a6.43 6.43 0 0 1 4.25 1.28c1.03.9 1.58 2.22 1.51 3.58.02.94-.19 1.86-.63 2.69-.43.76-1.07 1.37-1.84 1.77l2.88 4.51h-4.08Zm-4.7-6.7h2.63c.62.04 1.23-.16 1.7-.56.43-.41.65-1 .6-1.59.03-.58-.18-1.14-.6-1.55-.48-.38-1.09-.56-1.7-.51h-2.63v4.21ZM58.31.08h3.36v13.83h-3.16l-6.27-8.26v8.26h-3.38V.08H52l6.29 8.33.02-8.33ZM79.38 13.91h-4.32l-3.63-5.36-1.73 1.93v3.43h-3.61V.08h3.61v6l5.18-6h4.19l-5.13 5.71 5.44 8.12ZM82.58.08h10.91V3h-7.3v2.55h6.59v2.86h-6.59V11h7.49v2.88h-11.1V.08ZM110.75.08l-5 9.41v4.42h-3.61V9.59L97.06.08h3.61L104 6l3.14-5.92h3.61ZM131.56 1.08c1.07.55 1.97 1.39 2.58 2.43.63 1.09.95 2.33.93 3.59.02 1.26-.3 2.51-.94 3.6a6.293 6.293 0 0 1-2.63 2.43c-1.22.6-2.56.9-3.91.87h-5.8V.22h5.94a8.2 8.2 0 0 1 3.83.86Zm-1.88 9.52c.55-.33.98-.82 1.26-1.4.31-.64.46-1.35.45-2.06.01-.73-.15-1.44-.48-2.09-.3-.58-.76-1.07-1.33-1.4-.58-.34-1.25-.52-1.93-.5h-2.26v7.94h2.44c.65.01 1.29-.16 1.85-.49ZM138.75.22h3.59V14h-3.59V.22ZM155.59 7h3.1v5.49c-.82.58-1.73 1.02-2.7 1.31-.97.31-1.98.48-3 .5a7.5 7.5 0 0 1-3.76-.94c-1.1-.6-2.02-1.48-2.65-2.56a7.047 7.047 0 0 1-1-3.66c-.01-1.28.33-2.54 1-3.63A6.984 6.984 0 0 1 149.3.92c1.2-.62 2.54-.94 3.89-.92 1.04 0 2.08.2 3.06.56.95.33 1.84.84 2.6 1.5l-2 2.52a5.98 5.98 0 0 0-1.73-1.12c-.6-.26-1.25-.4-1.91-.41-.7-.02-1.4.17-2 .53-.59.34-1.09.83-1.43 1.42-.34.64-.52 1.35-.51 2.07-.01.73.16 1.45.51 2.09.33.61.82 1.12 1.42 1.47.61.35 1.3.54 2 .53.83-.04 1.65-.27 2.38-.67V7ZM163 .22h3.6V14H163V.22ZM169.92.22h11.82v3h-4.13V14H174V3.19h-4.09V.22ZM194.18 14l-.94-2.44h-6l-1 2.44h-3.7l6-13.78h3.7L198 14h-3.82Zm-5.81-5.19h3.81l-1.89-4.92-1.92 4.92ZM201.15.22h3.6v10.71h5.84V14h-9.44V.22Z" class="cls-1"/>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </body>
</html>
