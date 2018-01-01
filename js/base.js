jQuery.extend({
    postJSON: function (url, data, callback) {
        return jQuery.post(url, data, callback, "json");
    },
    getSyncJSON: function (url, data, callback) {
        return jQuery.getSync(url, data, callback, "json");
    },
    postSyncJSON: function (url, data, callback) {
        return jQuery.postSync(url, data, callback, "json");
    }
});