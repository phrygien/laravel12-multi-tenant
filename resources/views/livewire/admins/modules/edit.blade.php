<div>
    <form wire:submit="updateModule()">
        <flux:modal name="edit-module" class="md:w-full">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ __("Mise à jour module") }}</flux:heading>
                </div>

                <flux:input label="Nom du module" placeholder="Nom du module" wire:model.live="name" />
                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Enregistrer</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>
</div>
