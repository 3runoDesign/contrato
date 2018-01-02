@extends('layouts.pdf')

@section('content')

    @php
        $contratante = $agreement->customer;
        $services = explode(';', $agreement->description_services);
        $schedules = explode(';', $agreement->event_schedule);
    @endphp

    <div class="container">
        <div class="row">
            <article id="introducao" class="clause">

                <p>Pelo presente Instrumento Particular de Prestação de Serviços Fotográficos, de um lado:</p>

                <ul class="ul-agreement">
                    <li>
                        Sr(a). <strong class="featured">{{ $contratante->name }}</strong> residente e domiciliado na {{ $contratante->address }},
                        nº{{ $contratante->building_number }}. {{ $contratante->district }} {{ $contratante->city }}-{{ $contratante->uf }},
                        portador do documento de identidade tipo RG, nº <strong class="featured">{{ $contratante->rg }}</strong>,
                        inscrito no CPF sob o nº <strong class="featured">{{ $contratante->cpf }}</strong>, com contatos telefônicos de nº {{ $contratante->phone }}
                        doravante denominado exclusivamente <strong class="featured">CONTRATANTE</strong> e, de outro lado;
                    </li>
                    <li>
                        <strong class="featured">{{ config('contrato.contratado.name') }}</strong>, situa à {{ config('contrato.contratado.address') }},
                        portador do CPF de nº <strong class="featured">{{ config('contrato.contratado.cpf') }}</strong> doravante denominado exclusivamente CONTRATADO,
                        têm entre si, justos e contratados, as cláusulas e condições que seguem:
                    </li>
                </ul>
            </article>

            <article id="first-clause" class="clause">
                <h4 class="title-clause">Cláusula Primeira – Objeto</h4>

                <p>
                    O presente instrumento se destina à regulamentação da prestação de serviços
                    fotográficos (<strong class="featured">com duração estimada de até {{ $agreement->total_hours }} {{ str_plural('hora', $agreement->total_hour) }}</strong>), a serem realizados pelo CONTRATADO,
                    em favor do CONTRATANTE, sendo certo que as especificações referentes tipo do evento,
                    forma e custos da execução dos serviços contratados serão como segue:
                </p>

                <div class="cont-indentation">
                    <h5>Art.1º - Eventos Contratados:</h5>
                    <p>Este instrumento refere-se à contratação {{ str_plural('do', count($services)) }} {{ str_plural('seguinte', count($services)) }} {{ str_plural('serviço', count($services)) }}:</p>

                    <ul>
                        @foreach($services as $item)
                            <li>{{ ltrim($item) }};</li>
                        @endforeach
                    </ul>

                    <h5>Art.2º - Agenda:</h5>
                    <p>Este instrumento refere-se à contratação {{ str_plural('na', count($schedules)) }} {{ str_plural('seguinte', count($schedules)) }} {{ str_plural('data', count($schedules)) }}:</p>

                    <ul>
                        @foreach($schedules as $schedule)
                            <li>{{ ltrim($schedule) }};</li>
                        @endforeach
                    </ul>

                    <h5>Art.3º - Tipo de Serviço Contratado:</h5>

                    <ul>
                        <li>
                            O serviço contratado será executado pela
                            equipe composta por <strong class="featured">Bruno Fernando</strong>.
                        </li>
                        <li>
                            O serviço contratado é o de cobertura fotográfica do(s) evento(s) acima descrito e a
                            entrega do material final na forma digital ou impresso caso vier a ser adicionado
                            neste e terá em cada fotografia uma edição individual de enquadramento, coloração e contraste.
                            Não cabendo nenhum tipo de manipulação digital tais como: correção de cicatrizes,
                            espinhas, roupas rasgadas, estrutura corporal e afins.
                        </li>

                    </ul>

                    <h5>Art.4º - Valores</h5>
                    <p>Fica justo e acertado o valor total de <strong class="featured">R$ {{ $agreement->price }}</strong> (<i>{{ $agreement->writtenAmount() }}</i>), para a execução dos  que o pagamento será feito como descrito abaixo:</p>

                        <ul>
                            <li>{{ $agreement->payment_terms }}</li>
                        </ul>


                </div>

            </article>

            <article id="two-clause" class="clause">
                <h4 class="title-clause">Cláusula Segunda – Responsabilidades</h4>

                <p>
                    O CONTRATADO se responsabilizará, exclusivamente, pela qualidade da prestação dos serviços
                    contratados nas condições em que forem pactuados, cumprindo ao mesmo o comparecimento no local,
                    data e hora combinados, com sua equipe, e munidos dos equipamentos necessários à realização
                    dos serviços a serem executados.
                </p>

                <p>
                    § 1º As especificações constantes na cláusula primeira do presente instrumento são de inteira
                    responsabilidade do CONTRATANTE e, havendo necessidade de se promover eventuais alterações no pactuado,
                    o CONTRATANTE deverá comunicar ao CONTRATADO, de maneira expressa e por escrito,
                    com antecedência mínima de 10 (dez) dias úteis, acerca das novas condições a serem observadas.
                </p>

                <p>
                    § 2º O CONTRATADO não se responsabilizará pela eventual impossibilidade no atendimento às
                    necessidades do CONTRATANTE caso ocorram alterações fora do prazo mencionado no § 1º da presente cláusula
                    em referência ao local, data e horário da execução dos serviços contratados,
                    sendo certo que a viabilidade de sua execução será condicionada à disponibilidade de pessoal e equipamentos.
                </p>

                <p>
                    § 3º O CONTRATADO não se responsabilizará por problemas causados por fenômenos da natureza e/ou
                    terceiros que, de qualquer modo, venham a prejudicar o bom andamento do serviço contratado.
                </p>

                <p>
                    § 4º Fica acertado que, em caso de motivo de força maior justificável que impossibilitem a pessoa do
                    CONTRATADO estar presente na data do evento para a cobertura do mesmo, o CONTRATANTE já autoriza o
                    CONTRATADO a substituir sua presença por outro profissional do mesmo nível técnico e portando
                    equipamentos semelhantes.
                </p>

                <p>
                    § 5º Em caso do evento perdurar por além de 04(quatro) horas, o CONTRATANTE desde já autoriza ao
                    CONTRATADO, bem como todos os componentes de sua equipe, a utilizar-se do mesmo serviço de alimentação
                    que, por acaso, estiver sendo servido aos convidados.
                </p>

                <p>
                    § 6º Fica desde já acertado que, caso existam quaisquer taxas e valores a serem pagos aos locais do
                    evento para que o CONTRATADO possa exercer suas funções, que as mesmas correrão exclusivamente por
                    conta do CONTRATANTE, não cabendo ao CONTRATADO nenhuma responsabilidade sobre o valor a ser pago.
                </p>

                <p>
                    § 7º O CONTRATADO fica isento de quaisquer responsabilidades caso não consiga exercer seu trabalho
                    com seus equipamentos habituais, em virtude de proibições que venham a ocorrer por parte da
                    administração do(s) local(s) onde ocorrerá(ão) o(s) evento(s).
                </p>

                <p>
                    § 8º Fica acordado que, a organização dos amigos e familiares para as fotografias protocolares ficará
                    de responsabilidade do CONTRATANTE. Ficando assim, o CONTRATADO fica isento de quaisquer
                    responsabilidades caso não consiga exercer seu trabalho.
                </p>

                <p>
                    § 9º Fica acordado que, caso o evento(s) for fora da cidade de Araguaína-TO, ficará de responsabilidade
                    do CONTRATANTE os custos como: deslocamento de ida e volta, hospedagem e translado. Para valores como de passagens,
                    o mesmo deverá ser repassado ao CONTRATADO com antecedência mínima de 10 (dez) dias úteis antes da data do(s) evento(s).
                </p>

                {{-- TODO: Locais para ensaios --}}

            </article>

            <article id="three-clause" class="clause">
                <h4 class="title-clause">Cláusula Terceira – Valores e Condições de Pagamento</h4>

                <p>
                    Os valores e condições de pagamento contratados, tanto para pacotes de fotografias, fotos avulsas,
                    making-Of e demais serviços, estarão descritos no Artigo 3º da Cláusula primeira deste instrumento.

                    <p class="cont-indentation">
                        § único: Nos casos de depósito, tranferência ou qualquer outro tipo de movimentação bancária,
                        deverá ser para a seguinte conta:
                        <br/>
                        <br/>
                        <span>
                            {!! nl2br(config('contrato.contratado.bank_business')) !!}
                        </span>
                    </p>
                </p>

                <p>
                    § 1º Os valores contratados e descritos no Artigo supracitado ao presente instrumento terão validade
                    por até 60 (sessenta) dias após a realização do evento, findo o qual poderá ser reajustado conforme
                    valores de mercado praticados à época.
                </p>

                <p>
                    § 2º O presente instrumento é feito em caráter irrevogável, ficando estabelecido que no caso do
                    CONTRATANTE necessitar o cancelamento ou rescisão do presente seja por qual motivo for,
                    incorrerá nas seguintes penalidades:
                </p>

                <ul class="agreement-alpha">
                    <li>
                        Multa de 25% (vinte e cinco por cento), sobre o valor total referente a este instrumento,
                        devidamente atualizado, se houver comunicado expresso e por escrito ao CONTRATADO,
                        com antecedência de 120(cento e vinte) dias da data do evento.
                    </li>

                    <li>
                        Multa de 50% (cinquenta por cento), sobre o valor total referente a este instrumento, devidamente
                        atualizado, se houver comunicado expresso e por escrito ao CONTRATADO, com antecedência
                        inferior a 120(cento e vinte) dias da data do evento.
                    </li>
                </ul>

                <p>
                    § 3º A responsabilidade pelo cancelamento dos serviços contratados em decorrência da aplicação do
                    disposto junto ao § 2º da Cláusula Segunda do presente instrumento será imputada ao CONTRATANTE,
                    sendo certo que o mesmo deverá arcar, nesta hipótese, com o pagamento das multas previstas nas
                    alíneas "a" e "b" do § anterior.
                </p>

                <p>
                    § 4º Caso o total dos pagamentos já efetuados seja inferior ao montante das multas,
                    o CONTRATANTE deverá complementar o valor na data da rescisão, visto que a multa estipulada
                    se destina à cobertura de despesas diretas e indiretas relacionadas com o evento contratado,
                    não podendo, portanto, ser utilizada pelo CONTRATANTE, ou por terceiros indicados,
                    bem como não compensadas com eventuais novas datas ou eventos a serem prestados pelo CONTRATADO.
                </p>

                <p>
                    § 5º Caso tenha havido pagamento de valores superiores aos montantes da multa,
                    o CONTRATADO realizará a devolução do saldo devidamente corrigido, nos termos do orçamento,
                    contando-se tal correção do mês de recebimento até a data da efetiva restituição
                    ou na forma de serviços a ser prestados ou fornecidos em futuro próximo, não superior a 120(cento e vinte),
                    dias da rescisão. No caso do CONTRATANTE optar por  fornecimento de serviços, fica desde já ajustado
                    que os mesmos numerários que encontram-se em poder do CONTRATADO serão corrigidos utilizando-se os
                    mesmos índices e formas descritos no parágrafo  acima, e que os serviços serão cotados ao preço do dia.
                </p>
            </article>

            <article id="four-clause" class="clause">
                <h4 class="title-clause">Cláusula Quarta – Prazos de entrega</h4>

                <p>
                    § 1° O CONTRATADO se obriga a entregar o CD/pen-drive ou por meio de acesso digital as fotos para escolha,
                    no máximo, 30(trinta) dias úteis após a data do evento.
                </p>

                <p>
                    § 2° Assim que receberem o CD/pen-drive ou o acesso digital das prova, o CONTRATANTE se obriga a devolver a
                    lista com as fotografias escolhidas no prazo máximo de 30(trinta) dias do recebimento do mesmo,
                    sob pena de multa de 10% (dez por cento) do valor do contrato, por mês de atraso.
                </p>

                <p>
                    § 3° Assim que receber a lista com as fotografias escolhidas, o CONTRATADO se obriga a editar o álbum
                    digital em no máximo 60(trinta) dias úteis, a fim de que o CONTRATANTE possa aprovar e, assim,
                    encaminhar para o material de entrega caso tenha incluso tal serviço.

                    <p class="cont-indentation">
                        § único: Quando da aprovação para o material de entrega, caso tenha, o CONTRATANTE deverá fazer
                        o pagamento materiais excedentes ao contratado, quando da existência dos mesmos.
                    </p>
                </p>

                <p>
                    §4°	Os prazos para a entrega do produto final, terá de respeitar o prazo de produção e transporte de terceiros,
                    o que foge ao controle do CONTRATADO, não podendo, o mesmo, sofrer penalização de qualquer espécie pelos mesmos.
                </p>
            </article>
            <div class="page-break">
                <article id="five-clause" class="clause">
                    <h4 class="title-clause">Cláusula Quinta – Disposições Finais</h4>

                    <p>
                        §1° Os arquivos digitais são de propriedade exclusiva do CONTRATADO e sua disponibilização ao
                        CONTRATANTE após a expiração da “galeria online”, caso contratado, não faz parte deste instrumento,
                        cabendo, para tanto, solicitação de orçamento em separado.
                    </p>

                    <p>
                        § 2° O CONTRATANTE não se opõe quanto ao uso dos arquivos digitais pelo CONTRATADO, uma vez que os
                        mesmos fazem parte de seu novo ativo comercial, como também, podendo ser usados inclusive como amostras,
                        na confecção de materiais de marketing pessoal - impresso e/ou digital - do CONTRATADO, bem como em
                        concursos internos e externos, edições de livros e exposições.
                    </p>

                    <p>
                        § 3° Por se tratar de serviço e contrato certo, o CONTRATADO gozará de plena exclusividade dos mesmos,
                        ficando desde já previamente ajustado e determinado a proibição de terceiros, mesmo até convidados,
                        parentes ou amigos que venham a fazer quaisquer fotografias, com quaisquer tipos de equipamentos,
                        dentro dos mesmos limites do evento e que venham – ao mesmo tempo - obstruir direta ou indiretamente
                        o bom andamento dos trabalhos do CONTRATADO e/ou de sua equipe.

                        <p class="cont-indentation">
                            § único: O contratado não se responsabiliza por problemas na captação de imagens causados por
                            terceiros – mesmo que convidados do evento – que estiverem fazendo fotografias e/ou filmagens no local,
                            seja com que equipamento for.
                        </p>

                    </p>

                    <article>

                        <p>
                            Todas e quaisquer questões que surjam em decorrência da execução dos termos do presente instrumento,
                            ou que dele originarem, serão solucionadas amigavelmente entre as partes. Na impossibilidade de uma
                            solução conciliatória, as partes elegem o foro da Comarca de Araguaína - TO, com exclusão de quaisquer
                            outros por mais privilegiados que sejam ou que venham a ser.
                        </p>

                        <p>
                            E por estarem assim justos e contratados, assinam o presente contrato –
                           todas numeradas - em 02(duas) vias de igual teor e forma.
                        </p>

                    </article>

                </article>

                <div class="signature clearfix">
                    <p>
                        Araguaína-TO, <time datetime="{{ $agreement->date_agreement }}">{!! $agreement->date_agreement->formatLocalized('%d de <span>' . trans('dates.' . strtolower($agreement->date_agreement->formatLocalized('%B'))) . '</span> de %Y') !!}</time>.</p>

                    <div class="person-info">
                        <hr>
                        <span class="name">{{ config('contrato.contratado.name') }}<br> CPF: {{ config('contrato.contratado.cpf') }}</span>
                    </div>
                    <div class="person-info">
                        <hr>
                        <span class="name">{{ $agreement->customer->name }}<br> CPF: {{ $agreement->customer->cpf }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
