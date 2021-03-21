<form class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <label for="name" class="sr-only">Name</label>
        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name" required>
    </div>
    <button wire:click.prevent="store()" type="submit" class="btn btn-success mb-2">Add New</button>
</form>