<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send email</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="bg-green-500 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-xs">
            <form action="{{ route('email.send')}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        name
                    </label>
                    <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="your name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="your email" name="email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                        Subject
                    </label>
                    <input class="shadow appearance-none border w-full py-2 px-3 " type="text" placeholder="name" name="subject">
                </div>
                <div class="mb-4">
                    <textarea class="shadow appearance-none border w-full" name="message" cols="30" rows="10"></textarea>
                </div>
             
                <div class="flex justify-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Send
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>