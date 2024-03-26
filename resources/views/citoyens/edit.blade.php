<!-- resources/views/livewire/admin/citoyen/create.blade.php -->

<div>
  <form wire:submit.prevent="create">
      <div>
          <label>Email:</label>
          <input type="email" wire:model="email_insc">
          @error('email_insc') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Nom:</label>
          <input type="text" wire:model="nom">
          @error('nom') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Prénom:</label>
          <input type="text" wire:model="prenom">
          @error('prenom') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>CNIE:</label>
          <input type="text" wire:model="Cnie">
          @error('Cnie') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Date de Naissance:</label>
          <input type="date" wire:model="date_naissance">
          @error('date_naissance') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Age:</label>
          <input type="number" wire:model="age" readonly>
      </div>

      <div>
          <label>Genre:</label>
          <select wire:model="genre">
              <option value="">Sélectionner le genre</option>
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
          </select>
          @error('genre') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Téléphone:</label>
          <input type="text" wire:model="telephone">
          @error('telephone') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Nationalité:</label>
          <input type="text" wire:model="nationalite">
          @error('nationalite') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Statut de Résidence:</label>
          <input type="text" wire:model="status_de_residence">
          @error('status_de_residence') <span>{{ $message }}</span> @enderror
      </div>

      <div>
          <label>Né au Maroc:</label>
          <input type="text" wire:model="ne_au_maroc">
          @error('ne_au_maroc') <span>{{ $message }}</span> @enderror
      </div>

      
      <div>
          <button type="submit">Submit</button>
      </div>
  </form>
</div>
