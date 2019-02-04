@extends('standard')

@section('title', 'Herbs')

@section('style')
  h3, li {
    padding-top: 10px;
    letter-spacing: 1px;
    color: #b5ad9d;
    line-height: 20px;
    text-align: justify;
    font-size: 11px;
  }
@endsection

@section('content')
    <h2>Herbs</h2>
      <h3>Plain:</h3>

      <li>Common comfrey: very common</li>
      <li>Rosemary: very common</li>
      <li>Corn bundle: rare</li>
      <li>Coca plant: very rare</li>
      <li>Grape: very rare</li>

      <h3>Forest:</h3>
      <li>Mistletoe: very common</li>
      <li>Hyllop: common</li>
      <li>Common holly: common</li>
      <li>Boletus: rare</li>
      <li>Cysangus: rare</li>

      <h3>Mountain:</h3>
      <li>Parsley root: very common</li>
      <li>Hellebore: very common</li>
      <li>Prunella vulgaris: rare</li>
      <li>Narcoberries: very rare</li>
      <li>Ginseng: very rare</li>

      <h3>Desert:</h3>
      <li>Mandrake: rare</li>
      <li>Orobacle: very rare</li>

      <h3>Waste:</h3>
      <li>Common comfrey: common</li>
      <li>Featherfoil: rare</li>
      <li>Marigold: rare</li>
      <li>Cabbage: rare</li>
      <li>Psyllium seeds: very rare</li>
@endsection
