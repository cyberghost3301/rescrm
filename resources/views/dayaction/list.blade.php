@extends('layouts.app')
@section('content')
<div class="container mx-auto">
  <h2 class="text-xl font-semibold mb-4">Day Action — List</h2>
  <div class="space-y-4">
    <?php foreach($loans as $loan): ?>
      <div x-data="{open:false}" class="bg-danger rounded-2xl shadow p-4">
        <div class="flex items-center justify-between">
          <div>
            <div class="font-semibold"><?php echo e($loan->customer->name); ?> (<?php echo e($loan->invoice_number); ?>)   </div>
            <div class="text-sm text-gray-600">Remaining: ₹<?php echo number_format($loan->total_amount_remaining,2); ?></div>
            <div class="bg-red-600 text-white p-4">NEERAJ TEST</div>
          </div>
          <button @click="open=!open" class="px-3 py-1 rounded bg-gray-100">View</button>
        </div>
        <div x-show="open" class="mt-3 space-y-3">
          <div class="text-sm">Front + Back (key fields shown):
            <div class="grid md:grid-cols-4 gap-2 text-xs mt-2">
              <div>Weekly Amt: ₹<?php echo number_format($loan->weekly_installment_amount,2); ?></div>
              <div>Skipped: <?php echo e($loan->weekly_skipped_installments); ?></div>
              <div>Non-pay Penalty: ₹<?php echo number_format($loan->non_payment_penalty,2); ?></div>
              <div>Late Penalty: ₹<?php echo number_format($loan->late_payment_penalty,2); ?></div>
            </div>
          </div>
          <div class="flex flex-wrap gap-2">
            <form method="post" action="<?php echo route('dayaction.penalty.nonpayment', $loan); ?>" onsubmit="return confirm('Are you sure you want to charge non payment penalty?')">
              <?php echo csrf_field(); ?> <button class="btn">Charge Penalty?</button>
            </form>
            <form method="post" action="<?php echo route('dayaction.penalty.late', $loan); ?>" onsubmit="return confirm('Are you sure you want to charge late payment penalty?')">
              <?php echo csrf_field(); ?> <button class="btn">Late Payment Penalty</button>
            </form>
            <form method="post" action="<?php echo route('dayaction.nopayment', $loan); ?>">
              <?php echo csrf_field(); ?> <button class="btn">Mark No Payment</button>
            </form>
            <form method="post" action="<?php echo route('dayaction.collect', $loan); ?>" class="flex items-center gap-2">
              <?php echo csrf_field(); ?>
              <input type="number" name="amount" step="0.01" min="0.01" max="<?php echo e($loan->total_amount_remaining); ?>" class="input w-40" placeholder="Collect ₹" required/>
              <button class="btn">Log Collection</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
@endsection

@push('styles')
<style>.btn{ padding: 0.5rem 1rem; border-radius: 0.5rem; background:#111827; color:#fff; }</style>
@endpush
