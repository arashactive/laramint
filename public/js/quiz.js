$(document).ready(function () {

    $("#btnQuestions .btnQuestion").removeClass('process-step-active');
    if (style == "StepByStep") {
        StepByStep();
    } else {
        OnePage();
    }
    $("#btnQuestions .btnQuestion:first").addClass('process-step-active');
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

    $("#btnQuestions .btnQuestion").removeClass('process-step-active');
    $("#btnQuestion-" + question).addClass('process-step-active');
    
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
