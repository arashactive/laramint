$(document).ready(function () {
    $("#btnQuestions .btnQuestion").removeClass("process-step-active");
    if (style == "StepByStep") {
        StepByStep();
    } else {
        OnePage();
    }
    $("#btnQuestions .btnQuestion:first").addClass("process-step-active");

    $("#saveAndClose").click(function (event) {
        event.preventDefault();

        $("#dialog-confirm").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            
            buttons: {
                "Save And Close": function () {
                    $(this).dialog("close");
                    saveAndClose();
                },
                Cancel: function () {
                    $(this).dialog("close");
                },
            },
        });
    });
});

function OnePage() {
    $("#questions").show();
    $(".question").show();
}

function StepByStep() {
    $("#questions").show();
    $("#questions .question").hide();
    $("#questions .question:first").show();
}

function showQuestion(question) {
    $("#btnQuestions .btnQuestion").removeClass("process-step-active");
    $("#btnQuestion-" + question).addClass("process-step-active");

    if (style == "StepByStep") {
        $("#questions .question").hide();
        $("#question-" + question).show();
    } else {
        scrollToAnchor(question);
    }
}

function scrollToAnchor(question) {
    var aTag = $("#question-" + question);
    $("html,body").animate({ scrollTop: aTag.offset().top }, "slow");
}

function saveAndClose() {

    $.when(
        $(".workout_questions").each(function () {
            var data = $(this).serialize();
            var url = $(this).attr("action");
    
            $.post(url, data, function (data) {});
        })
       ).then(function () {
            window.location.reload();
       });

    

    
}
