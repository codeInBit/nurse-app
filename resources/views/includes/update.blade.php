<form class="form-inline">
    <input type="hidden" wire:model="preventiveCareMeasureId">
    <div class="form-group mx-sm-3 mb-2">
        <label for="name" class="sr-only">Name</label>
        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name...">
    </div>
    <div class="form-group mx-sm-3">
        <button wire:click.prevent="update()" type="submit" class="btn btn-success mb-2">Update</button>
        &nbsp;&nbsp;
        <button wire:click.prevent="cancel()" type="submit" class="btn btn-danger mb-2">Cancel</button>
    </div>
</form>