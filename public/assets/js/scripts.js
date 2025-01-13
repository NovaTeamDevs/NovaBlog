const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
document.querySelectorAll("select[data-choices]").forEach((element) => {
    let config = {};
    if (element.dataset.selecttext !== "") {
        config.itemSelectText = element.dataset.selecttext;
    }
    new Choices(element, config);
});
document.querySelectorAll("input[data-taggable]").forEach((element) => {
    let config = {
        delimiter: ",",
        removeItemButton: true,
    };
    if (element.dataset.selecttext !== "") {
        config.addItemText = (value) => {
            return element.dataset.selecttext;
        };
    }
    new Choices(element, config);
});
function deleteItem(ele) {
    let url = ele.dataset.url;
    let title = ele.dataset.title;
    let token = ele.dataset.token;

    JSAlert.confirm(
        "آیا از حذف این مورد اطمینان دارید؟",
        "حذف " + title,
        JSAlert.Icons.Deleted,
        "تائید",
        "لغو"
    ).then(function (result) {
        if (result) {
            $.ajax({
                url: url,
                method: "post",
                data: {
                    _token: token,
                    _method: "DELETE",
                },
                success: function (response) {
                    if (response.success === true) {
                        JSAlert.alert(
                            response.message,
                            "پیام",
                            JSAlert.Icons.Success,
                            "بستن"
                        ).then(function () {
                            setTimeout(function () {
                                window.location.reload();
                            }, 500);
                        });
                    } else {
                        JSAlert.alert(
                            response.message,
                            "خطا",
                            JSAlert.Icons.Failed,
                            "بستن"
                        );
                    }
                },
                error: function (error) {
                    notifier.show(
                        "خطا",
                        "مشکلی پیش آمده. مجدد سعی کنید",
                        "danger",
                        "",
                        4000
                    );
                },
            });
        }
    });
}
document.querySelectorAll("form").forEach(function (form) {
    form.addEventListener("keypress", function (event) {
        if (event.code === "Enter" || event.key === "Enter") {
            event.preventDefault();
        }
    });
});
function changeStatus(element) {
    let url = element.dataset.url;
    let token = element.dataset.token;
    let statusElement = document.querySelector('select#status');
    let spinner = document.querySelector('div#status_spinner');
    let status_form = document.querySelector('div#status_change');
    let status_badge = document.querySelector('td#status_badge');

    spinner.classList.remove('d-none');
    status_form.classList.add('d-none');

    $.ajax({
        url: url,
        method: "post",
        data: {
            _token: token,
            status: statusElement.value
        },
        success: function (response) {
            spinner.classList.add('d-none');
            status_form.classList.remove('d-none');
            if (response.success === true) {
                status_badge.innerHTML = '';
                status_badge.innerHTML = `<span class="badge bg-${response.color}  py-2 px-3">${response.title}</span>`;
            } else {
                JSAlert.alert(response.message, "خطا", JSAlert.Icons.Failed, "بستن");
            }
        },
        error: function (error) {
            spinner.classList.add('d-none');
            status_form.classList.remove('d-none');
            notifier.show("خطا", "مشکلی پیش آمده. مجدد سعی کنید", "danger", "", 4000);
        },
    });
}
document.querySelectorAll('.btn-gen-passw').forEach((element) => {
    element.addEventListener('click', function (event) {
        let upper = true,
            nums = true,
            special = true,
            len = 10;
        const lower = "abcdefghijklmnopqrstuvwxyz",
            upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
            numChars = "0123456789",
            specialChars = "!@#$%^&*()-_=+[]{}|;:,.<>?";
        let chars = lower;
        if (upper) chars += upperChars;
        if (nums) chars += numChars;
        if (special) chars += specialChars;
        let pass = "";
        for (let i = 0; i < len; i++) {
            const randIdx = Math.floor(Math.random() * chars.length);
            pass += chars[randIdx];
        }
        document.querySelector('#password').value = pass;
    });
});
