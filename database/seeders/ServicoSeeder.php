<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicos')->insert([
            'nome' => 'Logotipo',
            'descricao' => 'Design profissional de logotipo para sua marca',
            'price' => 99.99,
            'imagem' => 'logotipo.jpg',
        ]);

        DB::table('servicos')->insert([
            'nome' => 'Vídeo Promocional',
            'descricao' => 'Criação de vídeos promocionais para sua empresa',
            'price' => 199.99,
            'imagem' => 'video_promocional.jpg',
        ]);

        // Adicione mais serviços conforme necessário
        // ...

        // Exemplo com mais dois serviços
        DB::table('servicos')->insert([
            'nome' => 'Banner Publicitário',
            'descricao' => 'Banner personalizado para campanhas publicitárias',
            'price' => 49.99,
            'imagem' => 'banner_publicitario.jpg',
        ]);

        DB::table('servicos')->insert([
            'nome' => 'Edição de Imagens',
            'descricao' => 'Edição profissional de imagens para suas necessidades',
            'price' => 79.99,
            'imagem' => 'edicao_imagens.jpg',
        ]);
    }
}
