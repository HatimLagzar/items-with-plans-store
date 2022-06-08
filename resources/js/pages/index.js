import ticketService from "../services/tickets/TicketService";

if (document.location.pathname.startsWith('/admin/tickets') === true) {
    ticketService.init()
}