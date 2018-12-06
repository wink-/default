<!-- pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      @media print {
        a[href]:after {
        content: none !important;
        }
      }    
    </style>
    <title>Surface Finish Technologies Quote {{$quote->id}}</title>
  </head>
  <body>
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <b><a href="{{ route('admin.quotes.index') }}">SURFACE FINISH TECHNOLOGIES</a></b>
                  </div>
                  <div class="panel-body">
                    <p>
                      <b>
                        <small>215 Judson Street, Elmira NY 14903</small> <br>
                        <small>P: 607-732-2909 F:607-733-6119</small> <br>
                        <small>www.surfacefinishtech.com</small> <br>
                      </b>
                    </p>
                  </div>
                </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
                  <div class="panel-heading">
                    <b><a href="{{ route('admin.quotes.edit', ['id' => $quote->id]) }}">SFT QUOTATION NUMBER {{$quote->id}}</a></b>
                  </div>
                  <div class="panel-body">
                    <p>
                      <b>
                        <small>Quote Date: {{$quote->created_at->format('Y-m-d')}}</small>
                        @if($quote->updated_at > $quote->created_at)
                        <br><small>Quote Updated: {{$quote->updated_at->format('Y-m-d')}}</small>
                        @endif
                        <br>
                        <small> {{$quote->customer->name}}</small><br>
                        @isset($quote->contact)
                        <small>{{ isset($quote->contact) ? $quote->contact->first_name : '' }} {{ isset($quote->contact) ? $quote->contact->last_name : '' }} </small><br>
                        @endisset
                      </b>
                    </p>
                  </div>
                </div>
              </div>
            </div>

                    <table class="table table-bordered table-condensed">
                        <tr>
                            <th>Part Number</th>
                            <td field-key='part_number'>{{ $quote->part_number }}</td>
                            <th>Part Description</th>
                            <td field-key='part_description'>{{ $quote->part_description }}</td>
                        </tr>

                        <tr>
                            <th>Process</th>
                            <td field-key='process'>{{ $quote->process->name ?? '' }}</td>
                            <th>Specification</th>
                            <td field-key='specification'>{{ $quote->specification ? $quote->specification : 'None' }}</td>
                        </tr>
                        <tr>
                            <th>Material</th>
                            <td field-key='material'>{{ $quote->material }}</td>
                            <th>Method</th>
                            <td field-key='method'>{{ $quote->method }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td field-key='quantity_minimum'>{{ $quote->quantity_minimum }} {{ isset($quote->quantity_maximum) ? 'to '. $quote->quantity_maximum : ''}} </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td field-key='price'>${{ $quote->price }} {{ $quote->units }} 
                              @isset($quote->minimum_lot_charge) 
                                <th>Minimum Lot</th>
                                <td> ${{$quote->minimum_lot_charge}}</td>
                              @endisset</td>
                        </tr>
                        @isset($quote->quantity_price_break)
                        <tr>
                            <th>Price Break #</th>
                            <td field-key='quantity_price_break'>{{ $quote->quantity_price_break }}</td>
                            <th>Price Break</th>
                            <td field-key='price_break'>${{ $quote->price_break }}</td>
                        </tr>
                        @endisset
                        @if (isset($quote->thickness_minimum) or isset($quote->thickness_maximum))
                        <tr>
                            <th>Thickness</th>
                            @isset($quote->thickness_minimum)
                            <td field-key='thickness_minimum'>{{ $quote->thickness_minimum }}" min</td>
                            @endisset
                            @isset($quote->thickness_maximum)
                            <td field-key='thickness_maximum'>{{ $quote->thickness_maximum }}" max</td>
                            @endisset

                        </tr>
                        @endif
                        
                        @if (isset($quote->baking_time_pre) or isset($quote->baking_temp_pre))
                        <tr>
                            <th>Pre-Plate Bake </th>
                            <td field-key='baking_time_pre'>{{ $quote->baking_temp_pre }} F for {{ $quote->baking_time_pre }} hours</td>
                        @endif
                        @if (isset($quote->baking_time_post) or isset($quote->baking_temp_post))
                            <th>Post-Plate Bake </th>
                            <td field-key='baking_time_post'>{{ $quote->baking_temp_post }} F for {{ $quote->baking_time_post }} hours</td>
                        </tr>
                        @endif
                        @isset($quote->bake_notes)
                        <tr>
                            <th>Baking Notes</th>
                            <td field-key='bake_notes'>{{ $quote->bake_notes }}</td>
                        </tr>                        
                        @endisset
                       
                        <tr>
                            <th>Blasting</th>
                            <td field-key='blasting'>{{ $quote->blasting == 1 ? 'Included' : 'None' }}</td>
                            @isset($quote->blast_notes)
                            <th>Blasting Note</th>
                            <td field-key='blast_notes'>{{ $quote->blast_notes }}</td>
                            @endisset
                        </tr>
                        <tr>
                            <th>Masking</th>
                            <td field-key='masking'>{{ $quote->masking == 1 ? 'Included' : 'None' }}</td>
                            @isset($quote->mask_notes)
                            <th>Masking Note</th>
                            <td field-key='mask_notes'>{{ $quote->mask_notes }}</td>
                            @endisset                            
                        </tr>
                        <tr>
                            <th>Testing</th>
                            <td field-key='testing'>{{ $quote->testing == 1 ? 'Included' : 'None' }}</td>
                            @isset($quote->test_notes)
                            <th>Testing Note</th>
                            <td field-key='test_notes'>{{ $quote->test_notes }}</td>
                            @endisset
                        </tr>
                    
                        <tr>
                            <th>Quoted By</th>
                            <td field-key='user'>{{  $quote->user->name ?? 'sales@surfacefinishtech.com' }}</td>
                        </tr>

                    </table>
          @isset($quote->notes)                    
          <div class ="row">
            <div class="col-xs-12">
              <div class="panel panel-info">
                <div class="panel-body">
                    <b>Notes:</b> {!! $quote->notes !!}                 
                </div>                
              </div>
            </div>
          </div>
          @endisset                    
          <div class="row">
            <div class="col-xs-12">
              <div class="panel panel-info">
                <div class="panel-body">
                  <p><small><b>Ordering Information:</b>
                  When ordering, provide SFT QUOTATION NUMBER and part number. Indicate the process which is to be performed on the parts along with any relevant information such as quantity of parts, specification of process, and any other details that are pertinent to producing the desired finish. Ordering details are posted at www.SurfaceFinishTech.com/order.<br>

                  <b>Quotation Disclaimer:</b>
                  We honor all quotes in good faith for up to 6 months. For all prices and products, Surface Finish Technologies, Inc. (SFT) reserves the right to make adjustments due to changing market conditions, manufacturer price changes, errors in communication, and other extenuating circumstances. All quotations are assuming payments of COD or Net 30 billing. Any payment greater than 30 days may incur additional charges.<br>

                  <b>Limitation of Liability:</b>
                  SFT will not be liable for lost profits, punitive damages, loss of business, even if advised of the possiblity of such damages prior to processing. Customer agrees that SFT is not responsible or liable for any amount of damages above the dollar amount paid by the customer to SFT for services rendered on the part(s). <small></p>
                </div>
              </div>
            </div>
          </div>
 

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>           
  </body>
</html>