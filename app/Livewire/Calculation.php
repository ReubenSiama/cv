<?php

namespace App\Livewire;

use App\Models\SavingConstraint;
use Livewire\Component;

class Calculation extends Component
{
  public $savingConstraints;
  public $income = 0;
  public $expenses = [];

  public function mount()
  {
    $this->savingConstraints = SavingConstraint::all();
    foreach($this->savingConstraints as $savingConstraint) {
      $this->expenses[$savingConstraint->id] = 0;
    }
  }

  public function updatedIncome()
  {
    $this->expenses = [];
    foreach($this->savingConstraints as $savingConstraint) {
      $this->expenses[$savingConstraint->id] = $this->income * $savingConstraint->percentage / 100;
    }
  }

  public function render()
  {
    return view('livewire.calculation');
  }
}
