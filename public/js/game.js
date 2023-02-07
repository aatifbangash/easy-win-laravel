// Config variables
var total_players = 3;
var drawn_number = Math.floor(Math.random() * 300) + 1;
var time_in_mins = 5;
// game script
var canvas = document.getElementById("draw-game");
var canvas2 = document.getElementById("draw-game2");
var context = canvas.getContext("2d");
var context2 = canvas2.getContext("2d");
window.addEventListener("load", eventWindowLoaded, false);
var movement = 0.1;
var circle_radius = Math.ceil(canvas.height / 2);
var lowerLimit = Math.ceil(canvas.width / 2) - circle_radius / 2;
var upperLimit = Math.ceil(canvas.width / 2) + circle_radius / 2;
var loaded = 0;
var numbers = [];
var sold_nums = [];
var player_count = 0;
var all_nums = new Array(300);
for (var i = 0; i < 300; i++) {
    all_nums[i] = i + 1;
}
var myVar;
var index = 8;
var total_circles = 600;
var total_distance = total_circles * circle_radius;
var distance_covered = 0;
var speed = 0.1;

function eventWindowLoaded() {
    //myVar = setInterval(canvasApp, 1);
    var isCompleted = document.getElementById("isCompleted").value;
    var timeInMinsVal = document.getElementById("time_in_mins").value;
    if (isCompleted != 0 || timeInMinsVal > 0) {
        var drawnNumberVal = document.getElementById("drawn_number").value;
        var priceImg = document.getElementById("price_image").src;

        if (drawnNumberVal) {
            drawn_number = parseInt(drawnNumberVal);
        }
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        Swal.fire({
            title: "Winner!",
            imageUrl: priceImg,
            imageHeight: 250,
            text: drawnNumberVal + " is the winner number of the game.",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false
        }).then(result => {
            if (result.value) {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });

        //mark complete
        if (isCompleted == 0 && timeInMinsVal > 0) {
            var gameId = document.getElementById("gameId").value;
            markCompleted(gameId);
            window.location.reload();
        }
    } else {
        var drawnNumberVal = document.getElementById("drawn_number").value;
        if (drawnNumberVal) {
            drawn_number = parseInt(drawnNumberVal);
        }

        var timeInMinsVal = document.getElementById("time_in_mins").value;
        if (timeInMinsVal) {
            time_in_mins = Math.abs(timeInMinsVal);
        }

        var playerCountVal = document.getElementById("player_count").value;
        if (playerCountVal) {
            player_count = playerCountVal;
        }

        if (player_count >= total_players) {
            var deadline = new Date(
                Date.parse(new Date()) + time_in_mins * 60 * 1000
            );
            initializeClock("clockdiv", deadline);
        }
    }
    canvasApp();
}

function Number() {
    this.drawX = 0;
    this.drawY = 0;
    this.num = 0;
}

function canvasApp() {
    context.clearRect(0, 0, 880, 40);
    context.fillStyle = "#FFF";
    context.fillRect(0, 0, canvas.width, canvas.height);
    context.strokeStyle = "#000000";
    context.lineWidth = 0;
    context.strokeRect(0, 1, canvas.width, canvas.height - 2);

    context2.clearRect(0, 0, 880, 40);
    context2.fillStyle = "#FFF";
    context2.fillRect(0, 0, canvas2.width, canvas2.height);
    context2.strokeStyle = "#000000";
    context2.lineWidth = 0;
    context2.strokeRect(0, 1, canvas2.width, canvas2.height - 2);
    var note_index = 0;
    for (var i = -2; i < total_circles; i++) {
        if (loaded == 0 && i != index) {
            numbers[i] = new Number();
            numbers[i].num = Math.floor(Math.random() * 300) + 1;
            if (numbers[i].num == drawn_number) {
                numbers[i].num = Math.floor(Math.random() * 300) + 1;
            }
            numbers[i].drawX = i * circle_radius + circle_radius;
            numbers[i].drawY = circle_radius;
            //console.log(numbers[i].num);
        } else if (loaded == 0 && i == index) {
            numbers[i] = new Number();
            numbers[i].num = drawn_number;
            numbers[i].drawX = i * circle_radius + circle_radius;
            numbers[i].drawY = circle_radius;
            //console.log(numbers[i].num);
        }
        //numbers[] = Math.floor(Math.random() * 10) + 1;

        if (
            numbers[i].num == drawn_number &&
            lowerLimit >= numbers[i].drawX - movement &&
            lowerLimit <= numbers[i].drawX - movement + circle_radius
        ) {
            clearInterval(myVar);
            note_index = i;
        } else if (
            lowerLimit >= numbers[i].drawX - movement &&
            lowerLimit <= numbers[i].drawX - movement + circle_radius &&
            note_index == 0
        ) {
            note_index = i;
        } else {
            context.beginPath();
            context.fillStyle = "#87ceeb";
            context.arc(
                numbers[i].drawX - movement,
                numbers[i].drawY,
                circle_radius / 2,
                0,
                2 * Math.PI
            );
            context.fill();
            context.stroke();
            context.font = "8pt Calibri";
            context.fillStyle = "white";
            context.textAlign = "center";
            context.fillText(
                numbers[i].num,
                numbers[i].drawX - movement,
                numbers[i].drawY
            );

            context2.beginPath();
            context2.fillStyle = "#87ceeb";
            context2.arc(
                numbers[i].drawX - movement,
                numbers[i].drawY,
                circle_radius / 2,
                0,
                2 * Math.PI
            );
            context2.fill();
            context2.stroke();
            context2.font = "8pt Calibri";
            context2.fillStyle = "white";
            context2.textAlign = "center";
            context2.fillText(
                numbers[i].num,
                numbers[i].drawX - movement,
                numbers[i].drawY
            );
        }
    }
    context.beginPath();
    context.fillStyle = "#87ceeb";
    context.strokeStyle = "black";
    context.lineWidth = 2;
    context.arc(
        lowerLimit - circle_radius / 2,
        numbers[note_index].drawY,
        circle_radius,
        0,
        2 * Math.PI
    );
    context.fill();
    context.stroke();
    context.font = "16pt Arial";
    context.fillStyle = "white";
    context.textAlign = "center";
    context.fillText(
        numbers[note_index].num,
        lowerLimit - circle_radius / 2,
        numbers[note_index].drawY
    );

    context2.beginPath();
    context2.fillStyle = "#87ceeb";
    context2.strokeStyle = "black";
    context2.lineWidth = 2;
    context2.arc(
        lowerLimit - circle_radius / 2,
        numbers[note_index].drawY,
        circle_radius,
        0,
        2 * Math.PI
    );
    context2.fill();
    context2.stroke();
    context2.font = "16pt Arial";
    context2.fillStyle = "white";
    context2.textAlign = "center";
    context2.fillText(
        numbers[note_index].num,
        lowerLimit - circle_radius / 2,
        numbers[note_index].drawY
    );
    //console.log((total_distance/movement));
    //movement += total_distance/(total_distance*movement);
    speed = speed + 0.025;
    movement = movement + 10 - speed;
    //console.log(movement);
    loaded = 1;
    note_index = 0;
}

function moveBalls() {
    //console.log('hmm');
}

function addToDraw() {
    if (player_count < total_players) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons
            .fire({
                title: "Enter Draw?",
                text: "You will be awarded an available random number!",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes, Confirm",
                cancelButtonText: "No, Cancel",
                reverseButtons: true
            })
            .then(result => {
                if (result.value) {
                    var sold_num;
                    var res;
                    var count = 0;
                    while (count < 100) {
                        sold_num = Math.floor(Math.random() * 300) + 1;
                        res = false;
                        res = sold_nums.indexOf(sold_num);
                        if (res > -1) {
                            continue;
                        }
                        count++;
                        break;
                    }

                    sold_nums.push(sold_num.toString());
                    player_count = player_count + 1;
                    if (player_count == total_players) {
                        var deadline = new Date(
                            Date.parse(new Date()) + time_in_mins * 60 * 1000
                        );
                        initializeClock("clockdiv", deadline);
                    }
                    var elem = document.getElementById("num" + sold_num);
                    elem.className = "page-item m-1 active";
                    document.getElementById("player_count1").innerHTML =
                        player_count + "/300";
                    document.getElementById("player_count2").innerHTML =
                        player_count + "/300";
                    swalWithBootstrapButtons.fire(
                        "Confirmed!",
                        "Your number " + sold_num + " has been confirmed.",
                        "success"
                    );
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled!",
                        "Your number has been cancelled.",
                        "error"
                    );
                }
            });
    } else {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "We are sold out!"
        });
    }
}

$(document).ready(function() {
    $(".page-link").click(function(evt) {
        if (player_count < total_players) {
            var clicked_num = evt.currentTarget.innerHTML;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Enter Draw?",
                    text: "Do you want to buy the number " + clicked_num + "?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: true,
                    allowOutsideClick: false,
                    onBeforeOpen: function(ele) {
                        var gameId = document.getElementById("gameId").value;
                        $.ajax({
                            type: "GET",
                            url: "/ajax/validate_num",
                            data: "gameId=" + gameId + "&num=" + clicked_num,
                            success: function(res) {
                                if (res.data.type == "NOT_LOGGED_IN") {
                                    alert("invalid call");
                                } else if (res.data.type == "NUMBER_LOCK") {
                                    swalWithBootstrapButtons.fire(
                                        "Failed!",
                                        "This number is already reserved.",
                                        "error"
                                    );
                                } else if (
                                    res.data.type == "ALREADY_BOUGHT_BY_OTHER"
                                ) {
                                    swalWithBootstrapButtons.fire(
                                        "Failed!",
                                        "The number you have clicked is already soldout.",
                                        "error"
                                    );
                                } else if (
                                    res.data.type == "ALREADY_BOUGHT_BY_YOU"
                                ) {
                                    swalWithBootstrapButtons.fire(
                                        "Failed!",
                                        "You cann't buy more than three numbers.",
                                        "error"
                                    );
                                }
                            },
                            async: false
                        });
                    },
                    onClose: function(ele) {
                        //fire on popup close
                    }
                })
                .then(result => {
                    if (result.value) {
                        //if true
                        var res = 0;
                        res = sold_nums.indexOf(clicked_num);
                        if (res == -1) {
                            sold_nums.push(clicked_num);
                            player_count = player_count + 1;
                            if (player_count == total_players) {
                                var deadline = new Date(
                                    Date.parse(new Date()) +
                                        time_in_mins * 60 * 1000
                                );
                                initializeClock("clockdiv", deadline);
                            }
                            var elem = document.getElementById(
                                "num" + clicked_num
                            );
                            elem.className = "page-item m-1 active";
                            document.getElementById("player_count1").innerHTML =
                                player_count + "/300";
                            document.getElementById("player_count2").innerHTML =
                                player_count + "/300";
                            // window.location = '/page/paypal';
                            document.getElementById("paypal-modal-btn").click();
                        } else {
                            swalWithBootstrapButtons.fire(
                                "Failed!",
                                "This number " +
                                    clicked_num +
                                    " has already been taken.",
                                "error"
                            );
                        }
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        var gameId = document.getElementById("gameId").value;
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content")
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: "/ajax/expire_num",
                            data: {
                                gameId: gameId,
                                num: clicked_num
                            },
                            success: function(res) {
                                console.log(res);
                            }
                        });
                        // swalWithBootstrapButtons.fire(
                        //     "Cancelled!",
                        //     "Your number has been cancelled.",
                        //     "error"
                        // );
                    }
                });
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "We are sold out!"
            });
        }
    });
});

$("#myModal-paypal").on("hidden.bs.modal", function() {
    // do something…
    window.location.reload();
});

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        total: t,
        days: days,
        hours: hours,
        minutes: minutes,
        seconds: seconds
    };
}

function initializeClock(id, endtime) {
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector(".days");
    var hoursSpan = clock.querySelector(".hours");
    var minutesSpan = clock.querySelector(".minutes");
    var secondsSpan = clock.querySelector(".seconds");

    function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
        minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
        secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
            myVar = setInterval(canvasApp, 1);
            var gameId = document.getElementById("gameId").value;
            markCompleted(gameId);
            // setTimeout(function() {
            //     window.location.reload();
            // }, 5000);
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

function markCompleted(gameId) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        type: "POST",
        url: "/ajax/mark_completed",
        data: {
            gameId: gameId
        },
        success: function(res) {
            console.log(res);
        }
    });
}
