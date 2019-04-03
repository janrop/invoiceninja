<?php

namespace App\Transformers;

use App\Models\Client;
use App\Models\ClientContact;
use App\Utils\Traits\MakesHash;

/**
 * @SWG\Definition(definition="Client", @SWG\Xml(name="Client"))
 */
class ClientTransformer extends EntityTransformer
{
    use MakesHash;
    /**
     * @SWG\Property(property="id", type="integer", example=1, readOnly=true)
     */
    protected $defaultIncludes = [
        'contacts',
    ];

    /**
     * @var array
     */
    protected $availableIncludes = [
    ];


    /**
     * @param Client $client
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeContacts(Client $client)
    {
        $transformer = new ClientContactTransformer($this->serializer);

        return $this->includeCollection($client->contacts, $transformer, ClientContact::class);
    }


    /**
     * @param Client $client
     *
     * @return array
     */
    public function transform(Client $client)
    {
        return [
            'id' => $this->encodePrimaryKey($client->id),
            'name' => $client->name ?: '',
            'website' => $client->website ?: '',
            'private_notes' => $client->private_notes ?: '',
            'balance' => $client->balance ?: '',
            'paid_to_date' => $client->paid_to_date ?: '',
            'last_login' => $client->last_login ?: '',
            'address1' => $client->address1 ?: '',
            'address2' => $client->address2 ?: '',
            'city' => $client->city ?: '',
            'state' => $client->state ?: '',
            'postal_code' => $client->postal_code ?: '',
            'country_id' => $client->country_id ?: '',
            'custom_value1' => $client->custom_value1 ?: '',
            'custom_value2' => $client->custom_value2 ?: '',
            'custom_value3' => $client->custom_value3 ?: '',
            'custom_value4' => $client->custom_value4 ?: '',
            'shipping_address1' => $client->shipping_address1 ?: '',
            'shipping_address2' => $client->shipping_address2 ?: '',
            'shipping_city' => $client->shipping_city ?: '',
            'shipping_state' => $client->shipping_state ?: '',
            'shipping_postal_code' => $client->shipping_postal_code ?: '',
            'shipping_country_id' => $client->shipping_country_id ?: '',
            'settings' => $client->settings ?: '',
            'is_deleted' => (bool) $client->is_deleted ?: '',
            'payment_terms' => $client->payment_terms ?: '',
            'vat_number' => $client->vat_number ?: '',
            'id_number' => $client->id_number ?: '',
        ];
    }
}