var course = require('./course');
var lesson = require('./lesson');
var tabs = require('./tabs');
var user = require('./user');

document.addEventListener('DOMContentLoaded', function() {
    course.init();
    lesson.init();
    tabs.init();

    if (document.getElementById('js-user-page')) {
        user.init();
    }
});
