export default /*html*/`
<div class="mb-3 plan-item">
    <div class="form-group mb-3">
        <label for="ticket_plans-_ORDER_-nameInput" class="form-label">Title</label>
        <input class="form-control" id="ticket_plans-_ORDER_-nameInput" type="text" name="ticket_plans[_ORDER_][name]" required>
    </div>

    <div class="form-group mb-3">
        <label for="ticket_plans-_ORDER_-priceInput" class="form-label">Price</label>
        <input class="form-control" id="ticket_plans-_ORDER_-priceInput" type="number" step="any" name="ticket_plans[_ORDER_][price]" required>
    </div>

    <div class="form-group mb-3">
        <label for="ticket_plans-_ORDER_-stockInput" class="form-label">Stock</label>
        <input class="form-control" id="ticket_plans-_ORDER_-stockInput" type="number" step="1" name="ticket_plans[_ORDER_][stock]" required>
    </div>

    <button type="button" role="button" class="btn btn-sm btn-danger delete-ticket-plan"><i class="fa fa-trash"></i> Remove</button>
</div>
`;