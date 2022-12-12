const sCacheName = 'temp';
const aFilesToCache = [
    './',
    './index.html',
    './stock.php',
    './balanceSheet.html',
    './manifest.json'
];

self.addEventListener('install', pEvent => {
    console.log('Service Worker Loaded');
    pEvent.waitUntil(
        caches.open(sCacheName)
        .then(pCache => {
            console.log('File in Cache');
            return pCache.addAll(aFilesToCache);
        })
    );
});

self.addEventListener('activate', pEvent => {
    console.log('Service Worker Activate');
});

self.addEventListener('fetch', pEvent => {
    pEvent.respondWith(
        caches.match(pEvent.request)
        .then(response => {
            if(!response){
                console.log('Ask network get data', pEvent.request);
                return fetch(pEvent.request);
            }
            console.log('Ask data to cache',pEvent.request);
            return response;
        }) .catch(err => console.log(err))
    );
});