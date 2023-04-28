@include('layouts/top')

<div class="create-post-body py-10">
    <div class="container mx-auto px-6">
        <div class="w-8/12">
            <div class="py-3 border-b border-gray-300">
                Create post
            </div>
            <div class="flex items-center space-x-10 bg-white border border-slate-300 rounded-md px-6 mt-5">
                <a href="#" class="post-option py-5 border-b-2 border-black" data-panel="post-panel-1">Post</a>
                <a href="#" class="post-option py-5" data-panel="post-panel-2">Photo</a>
                <a href="#" class="post-option py-5" data-panel="post-panel-3">Link</a>
            </div>
            <div id="post-panel-1" class="post-panel mt-8 block">
                <form>
                    <div class="mb-6">
                        <input type="text" id="title" placeholder="Title" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <textarea id="description" rows="5" placeholder="Text (optional)" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" style="resize: vertical; min-height: 60px;"></textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post</button>
                    </div>
                </form>
            </div>

            <div id="post-panel-2" class="post-panel hidden mt-8">
                <form>
                    <div class="mb-6">
                        <input type="text" id="title" placeholder="Title" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <input id="image" type="file" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post</button>
                    </div>
                </form>
            </div>

            <div id="post-panel-3" class="post-panel hidden mt-8">
                <form>
                    <div class="mb-6">
                        <input type="text" id="title" placeholder="Title" class="shadow appearance-none border border-slate-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <input id="link" type="url" placeholder="URL" name="link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery CDN source -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        // Add click event listener to nav links
        $('.post-option').click(function(e) {
            e.preventDefault();

            // Get the panel ID from the data attribute
            var panelId = $(this).data('panel');

            // Toggle the active class on the nav link
            $('.post-option').removeClass('border-b-2 border-black');
            $(this).addClass('border-b-2 border-black');

                // Toggle the show/hide classes on the panel
            $('.post-panel').removeClass('show').addClass('hidden');
            $('#' + panelId).removeClass('hidden').addClass('show');

        });
        });
    </script>
@include('layouts/bottom')