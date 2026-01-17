@extends('layouts.dashboard-lecturer-layout')

@section('content')
  {{-- HERO + SEARCH --}}
  <x-hero-dashboard title="Tracker Academic"
    subtitle="Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.">
  </x-hero-dashboard>

  {{-- ACTIVITY STATS --}}
  <x-activity-stats :stats="$stats" />

  {{-- SEARCH BAR --}}
  <x-search-dashboard :filters="['All', 'Teaching', 'Research', 'Community Service', 'Support', 'Other']"
    placeholder="Search activity..." action="{{ url()->current() }}" />


  {{-- ACTIVITY TABLE --}}
  <x-activity-table-lecturer :rows="$rows" />

@endsection