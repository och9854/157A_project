$(function () {
    let params = new URLSearchParams(document.location.search);
    let module = params.get('module');
    let action = params.get('action');
    let modulesArray = [
        'student',
        'teacher',
        'group',
        'section',
        'subject',
        'dashboard'
    ];
    let actionArray = [
        'student_list',
        'add_student',
        'edit_student',
        'teacher_list',
        'add_teacher',
        'edit_teacher',
        'class_list',
        'add_class',
        'edit_class',
        'section_list',
        'add_section',
        'edit_section',
        'subject_list',
        'add_subject',
        'edit_subject',
        'index'
    ];

    if (
        modulesArray.indexOf(module) >= 0 &&
        actionArray.indexOf(action) >= 0
    ) {
        action = action.replace('_', '-');
        $("." + module).addClass('menu-open');
        $("." + module + " a:eq(0).nav-link").addClass('active');
        $(".nav-treeview ." + action).addClass('active')
    }
});