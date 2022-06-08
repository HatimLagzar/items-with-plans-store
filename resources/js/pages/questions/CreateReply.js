import questionService from "../../services/tickets/QuestionService";

class CreateReply {
    init() {
        questionService.init()
    }
}

export default new CreateReply();