<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Requests\InvoiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;

/**
 * Class InvoiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class InvoiceCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Invoice');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/invoice');
        $this->crud->setEntityNameStrings('invoice', 'invoices');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
//        $this->crud->setFromDb();
        $this->crud->setColumns(['first_name', 'last_name', 'invoice_number', 'price_activity','price_flight', 'price_extra_activity', 'price_deposit', 'price_total']);
        $this->crud->setColumnLabel('first_name', 'First Name');
        $this->crud->setColumnLabel('last_name', 'Last Name');
        $this->crud->setColumnLabel('invoice_number', 'Invoice Number');
        $this->crud->setColumnLabel('price_activity', 'Price Activity');
        $this->crud->setColumnLabel('price_extra_activity', 'Price Ext. Activity');
        $this->crud->setColumnLabel('price_flight', 'Price Flight');
        $this->crud->setColumnLabel('price_deposit', 'Price Deposit');
        $this->crud->setColumnLabel('price_total', 'Price Total');
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(InvoiceRequest::class);

        $this->crud->addField([
            "name" => "first_name",
            "label" => "First Name",
            "type" => "text",
        ]);

        $this->crud->addField([
            "name" => "last_name",
            "label" => "Last Name",
            "type" => "text",
        ]);

        $this->crud->addField([
            "name" => "address",
            "label" => "Address",
            "type" => "textarea",
        ]);

        $this->crud->addField([
            "name" => "invoice_number",
            "label" => "Invoice Number",
            "type" => "text",
        ]);

        $this->crud->addField([
            'name' => 'activity_participants',
            'label' => 'Participants',
            'type' => 'table',
            'entity_singular' => 'participant',
            'columns' => [
                'gender' => 'Gender',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
            ],
            'min' => 0,
            'max' => 99999,
        ]);

        $this->crud->addField([
            "name" => "activity_place",
            "label" => "Activity Place",
            "type" => "text",
        ]);

        $this->crud->addField([
            "name" => "activity_check_in",
            "label" => "Activity Check In",
            "type" => "date_picker",
        ]);

        $this->crud->addField([
            "name" => "activity_check_out",
            "label" => "Activity Check Out",
            "type" => "date_picker",
        ]);

        $this->crud->addField([
            "name" => "activity_rooms",
            'label' => 'Activity Rooms',
            'type' => 'table',
            'entity_singular' => 'room',
            'columns' => [
                'amount' => 'Amount',
                'type' => 'Room Type',
            ],
            'min' => 0,
            'max' => 99999,
        ]);

        $this->crud->addField([
            "name" => "activity_flight_tickets",
            'label' => 'Activity Flight Tickets',
            'type' => 'table',
            'entity_singular' => 'ticket',
            'columns' => [
                'pnr' => 'PNR',
                'origin' => 'Origin',
                'destination' => 'Destination',
                'departure_date' => 'Departure Date',
                'departure_time' => 'Departure Time',
                'arrival_date' => 'Arrival Date',
                'arrival_time' => 'Arrival Time',
            ],
            'min' => 0,
            'max' => 99999,
        ]);

        $this->crud->addField([
            "name" => "activity_program",
            'label' => 'Activity Program',
            'type' => 'table',
            'entity_singular' => 'program',
            'columns' => [
                'place' => 'Place',
                'date' => 'Date',
                'time' => 'Time',
                'participant_count' => 'Participant Count',
            ],
            'min' => 0,
            'max' => 99999,
        ]);

        $this->crud->addField([
            "name" => "has_airport_shuttle",
            "label" => "Has Airport Shuttle",
            "type" => "radio",
            "options" => [
                true => "Yes",
                false => "No",
            ],
        ]);

        $this->crud->addField([
            "name" => "has_golf_shuttle",
            "label" => "Has Golf Shuttle",
            "type" => "radio",
            "options" => [
                true => "Yes",
                false => "No",
            ],
        ]);

        $this->crud->addField([
            "name" => "price_activity",
            "label" => "Activity Price",
            "type" => "number",
            "suffix" => ".00",
        ]);

        $this->crud->addField([
            "name" => "price_extra_activity",
            "label" => "Extra Activity Price",
            "type" => "number",
            "suffix" => ".00",
        ]);

        $this->crud->addField([
            "name" => "price_deposit",
            "label" => "Deposit Price",
            "type" => "number",
            "suffix" => ".00",
        ]);
        $this->crud->addField([
            "name" => "price_flight",
            "label" => "Flight Price",
            "type" => "number",
            "suffix" => ".00",
        ]);

        $this->crud->addField([
            "name" => "price_total",
            "label" => "Total Price",
            "type" => "number",
            "suffix" => ".00",
        ]);

        $this->crud->addField([
            "name" => "payment_due_date",
            "label" => "Payment Due Date",
            "type" => "date_picker",
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupDownloadRoutes($segment, $routeName, $controller)
    {
        Route::get($segment . '/{id}/download', [
            'as' => $routeName . '.download',
            'uses' => $controller . '@download',
            'operation' => 'download',
        ]);
    }

    protected function setupDownloadDefaults()
    {
        $this->crud->allowAccess('download');
        $this->crud->setOperationSetting('setFromDb', true);

        $this->crud->operation('download', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('show', function () {
            $this->crud->addButton('line', 'download', 'view', 'buttons.download');
        });
    }

    public function download($id)
    {
        $this->crud->hasAccessOrFail('download');

        $id = $this->crud->getCurrentEntryId() ?? $id;

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Download Invoice';

        $this->crud->removeButton('download');

        return view('pages.invoices.download', $this->data);
    }
}
