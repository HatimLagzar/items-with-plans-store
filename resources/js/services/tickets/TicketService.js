import ticketPlanTemplate from '../../templates/ticket-plan/ticket-plan-template';

class TicketService {
    static TICKETS_PLANS_NODE_ID = 'ticket-plans';
    static ADD_PLAN_BTN_ID = 'add-new-ticket-plan';
    static PLAN_ITEM_CLASS_NAME = '.plan-item'
    static DELETE_TICKET_CLASS_NAME = '.delete-ticket-plan'

    constructor() {
        this.create = this.create.bind(this);
        this.delete = this.delete.bind(this);
    }

    /**
     * @returns {HTMLElement|null}
     */
    get ticketsPlansNode() {
        return document.getElementById(TicketService.TICKETS_PLANS_NODE_ID);
    }

    /**
     * @returns {HTMLElement|null}
     */
    get addPlanBtnNode() {
        return document.getElementById(TicketService.ADD_PLAN_BTN_ID);
    }

    init() {
        this.create()
        this.eventsBinding();
    }

    eventsBinding() {
        if (!this.ticketsPlansNode instanceof HTMLElement) {
            return;
        }

        if (this.addPlanBtnNode instanceof HTMLElement) {
            this.addPlanBtnNode.removeEventListener('click', this.create);
            this.addPlanBtnNode.addEventListener('click', this.create);
        }

        this.ticketsPlansNode.querySelectorAll(TicketService.PLAN_ITEM_CLASS_NAME).forEach(replyItem => {
            replyItem.querySelector(TicketService.DELETE_TICKET_CLASS_NAME).removeEventListener('click', this.delete);
            replyItem.querySelector(TicketService.DELETE_TICKET_CLASS_NAME).addEventListener('click', this.delete);
        });
    }

    create() {
        const order = this.countTicketPlans()

        this.addPlanBtnNode.insertAdjacentHTML(
            'beforebegin',
            ticketPlanTemplate.replaceAll('_ORDER_', order)
        );

        this.eventsBinding();
    }

    delete(e) {
        e.preventDefault()

        e.currentTarget.parentElement.remove()
    }

    countTicketPlans() {
        return this.ticketsPlansNode.querySelectorAll(TicketService.PLAN_ITEM_CLASS_NAME).length
    }
}

export default new TicketService();