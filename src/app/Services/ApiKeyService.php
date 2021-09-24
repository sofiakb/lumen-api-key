<?php


namespace Sofiakb\Lumen\ApiKey\Services;


use Carbon\Carbon;
use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Sofiakb\Utils\Helpers;
use Sofiakb\Utils\Result;

class ApiKeyService
{

    public function headers()
    {
        return collect([
            Helpers::toObject(['title' => '#', 'width' => 6, 'column' => 'active', 'class' => 'text-center']),
            Helpers::toObject(['title' => 'Clé', 'width' => 28, 'column' => 'key']),
            Helpers::toObject(['title' => 'Nom de la clé', 'width' => 16, 'column' => 'name']),
            Helpers::toObject(['title' => 'Création', 'width' => 20, 'column' => 'created']),
            Helpers::toObject(['title' => 'Modification', 'width' => 20, 'column' => 'updated']),
            Helpers::toObject(['title' => 'Action', 'width' => 10]),
        ]);
    }

    public function keys()
    {
        $parser = new Parser();
        $headers = $this->headers();

        return collect(ApiKey::all())
            ->map(fn($item) => Helpers::toObject([
                'id' => $item->id,
                Helpers::toObject(['column' => 'active', 'value' => $item->active, 'width' => $headers->first(fn($item) => $item->column === 'active')->width, 'class' => 'text-center']),
                Helpers::toObject(['column' => 'key', 'value' => $parser->decode($item->key), 'width' => $headers->first(fn($item) => $item->column === 'key')->width]),
                Helpers::toObject(['column' => 'name', 'value' => strtolower($item->name), 'width' => $headers->first(fn($item) => $item->column === 'name')->width]),
                Helpers::toObject(['column' => 'created', 'value' => Carbon::parse($item->created_at)->format('d/m/Y à H:i:s'), 'width' => $headers->first(fn($item) => $item->column === 'created')->width]),
                Helpers::toObject(['column' => 'updated', 'value' => Carbon::parse($item->updated_at)->format('d/m/Y à H:i:s'), 'width' => $headers->first(fn($item) => $item->column === 'updated')->width]),
            ]));
    }

    public function edit($query)
    {
        if (!isset($query->data) || ($body = $query->data) === null)
            return Result::badRequest();

        if (!isset($query->id) || !($id = $query->id))
            return Result::badRequest("L'ID est obligatoire");

        if (($data = json_decode(base64_decode($body), true)) === null)
            throw new \Exception("Request body required");

        if (($entry = ApiKey::whereId((int)$id)->first()) === null)
            return Result::notFound("Aucune clé n'existe pour l'ID #$id");

        if (isset($data['key']))
            $data['key'] = (new Parser())->encode($data['key']);

        return $entry->update($data);
    }

    public function destroy($query)
    {
        if (!isset($query->id) || !($id = $query->id))
            return Result::badRequest("L'ID est obligatoire");

        if (($entry = ApiKey::whereId((int)$id)->first()) === null)
            return Result::notFound("Aucune clé n'existe pour l'ID #$id");

        return $entry->delete();
    }

}
