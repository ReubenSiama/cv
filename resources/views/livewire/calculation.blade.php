<div class="p-4">
  <form action="" class="p-4">
    <label for="income">Income</label>
    <input id="income" type="text" placeholder="Income" wire:model.live="income"
    class="bg-black">
  </form>
  <table class="table md:w-1/2 w-full">
    <thead>
      <tr class="border border-b-1">
        <th class="text-left p-4">Name</th>
        <th class="text-right p-4">Percentage</th>
        <th class="text-right p-4">Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border border-b-1">
        <td class="p-4">Income</td>
        <td class="p-4 text-right"></td>
        <td class="p-4 text-right">{{ $income }}</td>
      </tr>
      @foreach ($savingConstraints as $constraint)
        <tr class="border border-b-1">
          <td class="p-4">{{ $constraint->name }}</td>
          <td class="p-4 text-right">{{ $constraint->percentage }}</td>
          <td class="p-4 text-right">{{ $expenses[$constraint->id] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
