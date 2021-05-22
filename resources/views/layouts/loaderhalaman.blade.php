<!-- loader halaman -->
<div class="pembungkus-loader min-h-screen absolute w-full z-10 flex flex-col space-y-3 justify-center items-center bg-gray-100">
    <div class="loader bg-white p-5 rounded-full flex space-x-3">
        <div class="w-5 h-5 bg-green-400 rounded-full animate-bounce"></div>
        <div class="w-5 h-5 bg-green-400 rounded-full animate-bounce"></div>
        <div class="w-5 h-5 bg-green-400 rounded-full animate-bounce"></div>
    </div>
    <span class="animate-pulse">Loading.. </span>
</div>
<script>
    const pemb = document.querySelector('.pembungkus-loader');
    window.onload = function(event) {
      pemb.remove();
    };
</script>
<!-- loader halaman -->
