let path = window.origin;
path = path.indexOf("localhost") !== -1 ? path + '/school_management/' : path;
$(function () {
    /**
     * Add Student form validation
     * @path views/Student/add_student.php
     */

    /* <=============== START STUDENT MODULE SCRIPT ===============> */

    $("#newStudentForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/student/add_student.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newStudentForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#newStudentForm').each(function () {
                            this.reset();
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('#newStudentForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * New Student Form Validation
     */

    $('#newStudentForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            sur_name: {
                required: true
            },
            contact_no: {
                required: true
            },
            pic: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please provide first name."
            },
            sur_name: {
                required: "Please provide sur name."
            },
            contact_no: {
                required: "Please provide contact no of either student or parent."
            },
            pic: {
                required: "Please upload profile pic of student."
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Edit Student Form Submit
     */

    $("#editStudentForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/student/edit_student.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newStudentForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('#editStudentForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * Edit Student Form Validation
     */

    $('#editStudentForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            sur_name: {
                required: true
            },
            contact_no: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please provide first name."
            },
            sur_name: {
                required: "Please provide sur name."
            },
            contact_no: {
                required: "Please provide contact no of either student or parent."
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Load Student List with datatable
     */

    $('#studentList').DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: 'post',
        ajax: {
            url: path + 'modules/ajax/student/student_list.php'
        },
        // scrollY: 200,
        columns: [
            {'data': 'id'},
            {'data': 'roll_no'},
            {'data': 'first_name'},
            {'data': 'middle_name'},
            {'data': 'sur_name'},
            {'data': 'contact_no'},
            {'data': 'alternate_contact_no'},
            {'data': 'is_active'},
            {
                mRender: function (data, type, row) {
                    return '<a href="' + path + 'index.php?module=student&action=edit_student&id=' + row.id + '" class="table-edit" data-id="' + row.id + '" title="Edit Record"><i class="material-icons">&#xE254;</i></a><a href="javascript:void(0)" onclick="deleteStudent(' + row.id + ')" class="table-delete delete-' + row.id + '" data-id="' + row.id + '" title="Delete Record"><i class="material-icons">&#xE872;</i></a>'
                }
            },
        ]
    });

    /* <=============== END STUDENT MODULE SCRIPT ===============> */

    /* <=============== START TEACHER MODULE SCRIPT ===============> */

    $("#newTeacherForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/teacher/add_teacher.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newStudentForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#newTeacherForm').each(function () {
                            this.reset();
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('#newTeacherForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * New Teacher Form Validation
     */

    $('#newTeacherForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            sur_name: {
                required: true
            },
            contact_no: {
                required: true
            },
            'subjects[]': {
                required: true
            },
            pic: {
                required: true
            },
            experience: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please provide first name."
            },
            sur_name: {
                required: "Please provide sur name."
            },
            contact_no: {
                required: "Please provide contact no."
            },
            'subjects[]': {
                required: "Please choose subjects"
            },
            pic: {
                required: "Please upload profile pic of teacher."
            },
            experience: {
                required: "Please select your experience in years"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Edit Teacher Form Submit
     */

    $("#editTeacherForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/teacher/edit_teacher.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#editTeacherForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('#editTeacherForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * Edit Teacher Form Validation
     */

    $('#editTeacherForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            sur_name: {
                required: true
            },
            contact_no: {
                required: true
            },
            'subjects[]': {
                required: true
            },
            experience: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Please provide first name."
            },
            sur_name: {
                required: "Please provide sur name."
            },
            contact_no: {
                required: "Please provide contact no."
            },
            'subjects[]': {
                required: "Please choose subjects"
            },
            experience: {
                required: "Please select your experience in years"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Load Teacher List with datatable
     */

    $('#teacherList').DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: 'post',
        ajax: {
            url: path + 'modules/ajax/teacher/teacher_list.php'
        },
        // scrollY: 200,
        columns: [
            {'data': 'id'},
            {'data': 'first_name'},
            {'data': 'middle_name'},
            {'data': 'sur_name'},
            {'data': 'contact_no'},
            {'data': 'alternate_contact_no'},
            {'data': 'subjects'},
            {'data': 'experience'},
            {'data': 'is_active'},
            {
                mRender: function (data, type, row) {
                    return '<a href="' + path + 'index.php?module=teacher&action=edit_teacher&id=' + row.id + '" class="table-edit" data-id="' + row.id + '" title="Edit Record"><i class="material-icons">&#xE254;</i></a><a href="javascript:void(0)" onclick="deleteTeacher(' + row.id + ')" class="table-delete delete-' + row.id + '" data-id="' + row.id + '" title="Delete Record"><i class="material-icons">&#xE872;</i></a>'
                }
            },
        ]
    });

    /* <=============== END TEACHER MODULE SCRIPT ===============> */


    /* <=============== START SUBJECT MODULE SCRIPT ===============> */

    $("#newSubjectForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/subject/add_subject.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newSubjectForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#newSubjectForm').each(function () {
                            this.reset();
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('#newSubjectForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * New/Edit Subject Form Validation
     */

    $('#newSubjectForm, #editSubjectForm').validate({
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please provide subject name."
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Edit Subject Form Submit
     */

    $("#editSubjectForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/subject/edit_subject.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#editSubjectForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('#editSubjectForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * Load Subject List with datatable
     */

    $('#subjectList').DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: 'post',
        ajax: {
            url: path + 'modules/ajax/subject/subject_list.php'
        },
        columns: [
            {'data': 'id'},
            {'data': 'name'},
            {
                mRender: function (data, type, row) {
                    return '<a href="' + path + 'index.php?module=subject&action=edit_subject&id=' + row.id + '" class="table-edit" data-id="' + row.id + '" title="Edit Record"><i class="material-icons">&#xE254;</i></a><a href="javascript:void(0)" onclick="deleteSubject(' + row.id + ')" class="table-delete delete-' + row.id + '" data-id="' + row.id + '" title="Delete Record"><i class="material-icons">&#xE872;</i></a>'
                }
            },
        ]
    });

    /* <=============== END SUBJECT MODULE SCRIPT ===============> */

    /* <=============== START SECTION MODULE SCRIPT ===============> */

    $("#newSectionForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/section/add_section.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newSectionForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#newSectionForm').each(function () {
                            this.reset();
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('#newSectionForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * New/Edit Section Form Validation
     */

    $('#newSectionForm, #editSectionForm').validate({
        rules: {
            class_id: {
                required: true,
            },
            name: {
                required: true,
            }
        },
        messages: {
            class_id: {
                required: "Please select class name in which you want to add section",
            },
            name: {
                required: "Please provide section name."
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Edit Section Form Submit
     */

    $("#editSectionForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/section/edit_section.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#editSectionForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('#editSectionForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * Load Section List with datatable
     */

    $('#sectionList').DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: 'post',
        ajax: {
            url: path + 'modules/ajax/section/section_list.php'
        },
        columns: [
            {'data': 'id'},
            {'data': 'name'},
            {'data': 'class_name'},
            {
                mRender: function (data, type, row) {
                    return '<a href="' + path + 'index.php?module=section&action=edit_section&id=' + row.id + '" class="table-edit" data-id="' + row.id + '" title="Edit Record"><i class="material-icons">&#xE254;</i></a><a href="javascript:void(0)" onclick="deleteSection(' + row.id + ')" class="table-delete delete-' + row.id + '" data-id="' + row.id + '" title="Delete Record"><i class="material-icons">&#xE872;</i></a>'
                }
            },
        ]
    });

    /* <=============== END SECTION MODULE SCRIPT ===============> */


    /* <=============== START CLASS MODULE SCRIPT ===============> */

    $("#newClassForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/group/add_class.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#newClassForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                        $('#newClassForm').each(function () {
                            this.reset();
                        });
                    } else {
                        toastr.error(response.message);
                    }
                    $('#newClassForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * New/Edit Class Form Validation
     */

    $('#newClassForm, #editClassForm').validate({
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please provide class name."
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Edit Class Form Submit
     */

    $("#editClassForm").on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid())
            $.ajax({
                type: 'POST',
                url: path + 'modules/ajax/group/edit_class.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#editClassForm').css("opacity", ".5");
                },
                success: function (response) {
                    if (response.status == true) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                    $('#editClassForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
    });

    /**
     * Load Section List with datatable
     */

    $('#classList').DataTable({
        processing: true,
        serverSide: true,
        sServerMethod: 'post',
        ajax: {
            url: path + 'modules/ajax/group/class_list.php'
        },
        columns: [
            {'data': 'id'},
            {'data': 'name'},
            {
                mRender: function (data, type, row) {
                    return '<a href="' + path + 'index.php?module=group&action=edit_class&id=' + row.id + '" class="table-edit" data-id="' + row.id + '" title="Edit Record"><i class="material-icons">&#xE254;</i></a><a href="javascript:void(0)" onclick="deleteClass(' + row.id + ')" class="table-delete delete-' + row.id + '" data-id="' + row.id + '" title="Delete Record"><i class="material-icons">&#xE872;</i></a>'
                }
            },
        ]
    });

    /* <=============== END CLASS MODULE SCRIPT ===============> */

});

/**
 * Delete Student Record
 */

function deleteStudent(id) {

    if (confirm('Are you sure, you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: path + 'modules/ajax/student/delete_student.php?id=' + id,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#studentList').css("opacity", ".5");
            },
            success: function (response) {
                if (response.status == true) {
                    toastr.success(response.message);
                    // remove row
                    $(".delete-" + id).parent().parent().remove();

                } else {
                    toastr.error(response.message);
                }
                $('#studentList').css("opacity", "");
            },
            error: function (error) {
                toastr.error(error);
            }
        });
    }
}

/**
 * Delete Teacher Record
 */

function deleteTeacher(id) {

    if (confirm('Are you sure, you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: path + 'modules/ajax/teacher/delete_teacher.php?id=' + id,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#teacherList').css("opacity", ".5");
            },
            success: function (response) {
                if (response.status == true) {
                    toastr.success(response.message);
                    // remove row
                    $(".delete-" + id).parent().parent().remove();

                } else {
                    toastr.error(response.message);
                }
                $('#teacherList').css("opacity", "");
            },
            error: function (error) {
                toastr.error(error);
            }
        });
    }
}

/**
 * Delete subject Record
 */

function deleteSubject(id) {

    if (confirm('Are you sure, you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: path + 'modules/ajax/subject/delete_subject.php?id=' + id,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#subjectList').css("opacity", ".5");
            },
            success: function (response) {
                if (response.status == true) {
                    toastr.success(response.message);
                    // remove row
                    $(".delete-" + id).parent().parent().remove();

                } else {
                    toastr.error(response.message);
                }
                $('#subjectList').css("opacity", "");
            },
            error: function (error) {
                toastr.error(error);
            }
        });
    }
}

/**
 * Delete section Record
 */

function deleteSection(id) {

    if (confirm('Are you sure, you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: path + 'modules/ajax/section/delete_section.php?id=' + id,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#sectionList').css("opacity", ".5");
            },
            success: function (response) {
                if (response.status == true) {
                    toastr.success(response.message);
                    // remove row
                    $(".delete-" + id).parent().parent().remove();

                } else {
                    toastr.error(response.message);
                }
                $('#sectionList').css("opacity", "");
            },
            error: function (error) {
                toastr.error(error);
            }
        });
    }
}

/**
 * Delete class Record
 */
function deleteClass(id) {

    if (confirm('Are you sure, you want to delete this record?')) {
        $.ajax({
            type: 'POST',
            url: path + 'modules/ajax/group/delete_class.php?id=' + id,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#classList').css("opacity", ".5");
            },
            success: function (response) {
                if (response.status == true) {
                    toastr.success(response.message);
                    // remove row
                    $(".delete-" + id).parent().parent().remove();

                } else {
                    toastr.error(response.message);
                }
                $('#classList').css("opacity", "");
            },
            error: function (error) {
                toastr.error(error);
            }
        });
    }
}

