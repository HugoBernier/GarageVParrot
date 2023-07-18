<?php

namespace Database\Factories;

use App\Models\AvisClient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AvisClientFactory extends Factory
{
    protected $model = AvisClient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $commentaire = [
            'Excellent service ! Le garage V. Parrot a réparé ma voiture rapidement et efficacement. Je recommande vivement.',
            "Très professionnel et amical. J'ai été impressionné par la qualité du travail effectué sur ma voiture.",
            "Le personnel du garage est très compétent et sympathique. Ils ont su résoudre tous les problèmes de ma voiture sans aucun souci.",
            "Je suis très satisfait du service que j'ai reçu. Le garage V. Parrot a été très transparent sur les réparations nécessaires et les coûts associés.",
            "Des réparations rapides et abordables. Je suis très content du résultat.",
            "Le garage V. Parrot a une équipe très professionnelle et courtoise. Ils ont pris soin de ma voiture comme s'il s'agissait de la leur.",
            "J'ai acheté une voiture d'occasion chez eux et je suis extrêmement satisfait. Le véhicule était en parfait état et le processus d'achat était simple.",
            "Un service client exceptionnel ! Ils ont répondu à toutes mes questions et m'ont guidé tout au long du processus de réparation de ma voiture.",
            "Je recommande fortement ce garage. Ils ont été très réactifs et ont résolu le problème de ma voiture rapidement.",
            "Des prix compétitifs et un travail de qualité. Je suis heureux d'avoir choisi le garage V. Parrot pour l'entretien de ma voiture."
        ];

        $randomNumber = mt_rand(0, 9); // Generate a random number between 0 and 9

        if ($randomNumber < 8) {
            $result = 1;
        } else {
            $result = null;
        }

        return [
            'approved_by' => $result,
            'nom' => $this->faker->name(),
            'commentaire' => $commentaire[array_rand($commentaire)],
            'note' => rand(3, 5),
        ];
    }
}
