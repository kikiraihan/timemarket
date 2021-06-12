var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
    '/',
    '/assets_kiki/css/loader.css',
    '/assets_kiki/TIME_MARKET_logo.svg',
    '/css/app.css',
    '/js/app.js',
];

self.addEventListener('install', function (event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function (cache) {
            console.log('In install service workers.. cache opened, di kondisi install dan berhasil dibuka');
            return cache.addAll(urlsToCache);
        })
    );
});


self.addEventListener('fetch', function (event) {
    event.respondWith(
        
        caches.match(event.request)
        .then(function (response) {
            
            if (response) {
                return response;
            }
            return fetch(event.request);
        })
    );
});



self.addEventListener('activate', function (event) {

    event.waitUntil(
        caches.keys().then(function (cacheNames) {
            return Promise.all(
                cacheNames.filter(function (cacheName) {
                    return cacheName != CACHE_NAME
                }).map(function (cacheName) {
                    return caches.delete(cacheName)
                })
            );
        })
    );
});
