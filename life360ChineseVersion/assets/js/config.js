require.config({
    // build用
    baseUrl: './js',
    // dev用
    // baseUrl: _wpktcore_js.theme_url + '/assets/js/',
    paths: {
        'jquery': 'lib/jquery',
        'bootstrap': 'lib/bootstrap',
        'theia': 'lib/theia-sticky-sidebar',
        'swiper': 'lib/swiper'
    },
    shim: {
        'bootstrap': ['jquery'],
        'theia': ['jquery']
    }
});