if($("#surveyQuestion"))
{
	const surveyQuestion = {
		addQuestionBtn: null,
		questionTypeSelect: null,
		renderQuestion: null,
		addOptBtn: null,
		key: null,
		questionBoxes: null,

		init: function(){
			this.addQuestionBtn = $("#addQuestion")
			this.questionTypeSelect = $("#questionTypeSelect")
			this.renderQuestion = "#renderQuestion"
			this.questionBoxes = $(".ques_container")
			this.key = 0

			if(this.questionBoxes[this.questionBoxes.length - 1])
			{
				let lastEle = this.questionBoxes[this.questionBoxes.length - 1];
				if($(lastEle).length)
				{
					this.key = $(lastEle).data("key")
					this.key++
				}
			}
			
			this.addQuestionBtn.on("click", this.addQuestionHandle)
			surveyQuestion.addOptionEventListener()
		},

		addQuestionHandle: function(){
			let questionType = surveyQuestion.questionTypeSelect.val()
			$(surveyQuestion.renderQuestion).append($(`.question_types .${questionType}`).clone()[0].outerHTML.replaceAll("{{key}}", surveyQuestion.key))
			// $(`.question_types .${questionType}`).clone().appendTo(surveyQuestion.renderQuestion)
			surveyQuestion.addOptionEventListener()
			surveyQuestion.key++
		},

		addOptionHandle: function(){
			$(this).parent(".options").find(".opt_clone .row").clone().appendTo($(this).parent(".options").find(".option_list"))
			surveyQuestion.addOptionEventListener()
		},

		removeOptionHandle: function(){
			$(this).parent().parent().remove()
		},

		addOptionEventListener: function()
		{
			$("body").find(".ques_container .add_opt").off("click", surveyQuestion.addOptionHandle)
			$("body").find(".ques_container .add_opt").on("click", surveyQuestion.addOptionHandle)
			$("body").find(".ques_container .option_list .remove_opt").off("click", surveyQuestion.removeOptionHandle)
			$("body").find(".ques_container .option_list .remove_opt").on("click", surveyQuestion.removeOptionHandle)
		}
	}

	surveyQuestion.init()
}