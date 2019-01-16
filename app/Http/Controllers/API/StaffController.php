<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\User;


class StaffController extends Controller
{
  public function index()
  {
    return json_encode(User::find(auth()->id())->staffSettings);
  }

  public function update()
  {
      $settings = User::find(request("user_id"))->staffSettings;

      $settings->ticketsStatistics = request("ticketsStatistics");
      $settings->ticketsOpen = request("ticketsOpen");
      $settings->ticketsClosed = request("ticketsClosed");
      $settings->tasksStatistics = request("tasksStatistics");
      $settings->tasksOpened = request("tasksOpened");
      $settings->tasksClosed = request("tasksClosed");
      $settings->invoiceStatistics = request("invoiceStatistics");
      $settings->invoicePaid = request("invoicePaid");
      $settings->invoiceUnpaid = request("invoiceUnpaid");
      $settings->invoiceCreate = request("invoiceCreate");

      $settings->save();
  }
}
