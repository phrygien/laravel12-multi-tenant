<div>
<flux:modal name="delete-module" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Supprimer Module?</flux:heading>

            <flux:subheading>
                <p>You're about to delete this project.</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Annuler</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="danger" wire:click="deleteData()">Supprimer le module</flux:button>
        </div>
    </div>
</flux:modal>
</div>
