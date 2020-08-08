<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * Método para mostrar los contactos.
     * Recibe como parámetro opcional: ('id').
     * @author Gian Vespa
     */
    public function show(Request $request): JsonResponse
    {
        if ($request->id){
            $contact = Contact::whereId($request->id)->first();
        }else{
            $contact = Contact::all();
        }
        if ($contact)
        {
            return response()->json($contact, 200);
        }
        return response()->json(['msg' => 'Sin registro que mostrar'], 200);
    }

       /**
     * @param Request $request
     * @return JsonResponse
     * Método para crear un contacto.
     * @author Gian Vespa
     */
    public function Create(Request $request): JsonResponse
    {
        if (!Contact::whereEmail($request->email)->first())
        {
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $request->state,
                'city' => $request->city,
            ]);
            return response()->json($contact, 200);
        }
        return response()->json(['msg' => 'Contacto existente'], 200);
    }

        /**
     * @return JsonResponse
     * Método para eliminar un contacto.
     * Recibe como parámetros el siguientes: Request('id').
     * @author Gian Vespa
     */
    public function destroy(): JsonResponse
    {
        try {
            $contact = Contact::whereId(Request('id'))->first();
            if ($contact){
                $contact->delete();
                return response()->json(['msg' => 'Contacto eliminado'], 200);
            }
            return response()->json(['msg' => 'Contacto no registrada'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 401);
        }
    }
}
